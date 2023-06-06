#define pinecho1 18
#define pintriger1 19
#define pinecho2 14
#define pintriger2 27
#define pinecho3 13
#define pintriger3 12
#define pinecho4 23
#define pintriger4 5
#include <ESP32Servo.h>
#include <analogWrite.h>
#include <ESP32PWM.h>
#include <WiFi.h>
#include <FirebaseESP32.h>

// Provide the token generation process info.
#include <addons/TokenHelper.h>

// Provide the RTDB payload printing info and other helper functions.
#include <addons/RTDBHelper.h>

#define WIFI_SSID "realme C17"
#define WIFI_PASSWORD "12345678"

#define API_KEY "AIzaSyDyMcWmWEe1Yqcygov6kkYw8MRcW3yNzD8"
#define DATABASE_URL "sistem-irigasi-db158-default-rtdb.asia-southeast1.firebasedatabase.app/"  //<databaseName>.firebaseio.com or <databaseName>.<region>.firebasedatabase.app
#define USER_EMAIL "intanimaniyah01@gmail.com"
#define USER_PASSWORD "secret"

FirebaseData fbdo;

FirebaseAuth auth;
FirebaseConfig config;

Servo myservo;
Servo myservo2;
Servo myservo3;
Servo myservo4;

float JARAK_BATAS = 4;
float read_srf(int pintriger, int pinecho) {
  long durasi;
  float jarak;
  digitalWrite(pintriger, LOW);
  delayMicroseconds(2);
  digitalWrite(pintriger, HIGH);
  delayMicroseconds(10);
  digitalWrite(pintriger, LOW);
  delayMicroseconds(2);

  durasi = pulseIn(pinecho, HIGH);
  jarak = durasi / 58.2;

  return jarak;
}
void setup() {
  Serial.begin(9600);
  Serial.println();
  Serial.println();

  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Connecting to Wi-Fi");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(300);
  }
  Serial.println();
  Serial.print("Connected with IP: ");
  Serial.println(WiFi.localIP());
  Serial.println();

  Serial.printf("Firebase Client v%s\n\n", FIREBASE_CLIENT_VERSION);

  /* Assign the api key (required) */
  config.api_key = API_KEY;

  /* Assign the user sign in credentials */
  auth.user.email = USER_EMAIL;
  auth.user.password = USER_PASSWORD;

  /* Assign the RTDB URL (required) */
  config.database_url = DATABASE_URL;

  /* Assign the callback function for the long running token generation task */
  config.token_status_callback = tokenStatusCallback;  // see addons/TokenHelper.h

  // Or use legacy authenticate method
  // config.database_url = DATABASE_URL;
  // config.signer.tokens.legacy_token = "<database secret>";

  // To connect without auth in Test Mode, see Authentications/TestMode/TestMode.ino

  Firebase.begin(&config, &auth);

  Firebase.reconnectWiFi(true);
  pinMode(pintriger1, OUTPUT);
  pinMode(pinecho1, INPUT);
  pinMode(pintriger2, OUTPUT);
  pinMode(pinecho2, INPUT);
  pinMode(pintriger3, OUTPUT);
  pinMode(pinecho3, INPUT);
  pinMode(pintriger4, OUTPUT);
  pinMode(pinecho4, INPUT);
  myservo.attach(16);
  myservo.write(180);
  myservo2.attach(17);
  myservo2.write(180);
  myservo3.attach(25);
  myservo3.write(180);
  myservo4.attach(26);
  myservo4.write(180);

  pinMode(2, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(15, OUTPUT);
  pinMode(33, OUTPUT);
}

void loop() {
  if (Firebase.ready()) {
    float jarak = read_srf(pintriger1, pinecho1);
    Firebase.set(fbdo, "controls/pintu_1/ketinggian_air", jarak);
    FirebaseJson json;
    json.set("ketinggian_air", jarak);
    json.set("tanggal/.sv", "timestamp");
    json.set("no_pintu", "pintu_1");
    Firebase.push(fbdo, "ketinggian_air", json);
    Firebase.getString(fbdo, "controls/pintu_1/mode");
    if (fbdo.stringData() == "manual") {
      Firebase.getBool(fbdo, "controls/pintu_1/status");
      if (fbdo.boolData()) {
        // pintu terbuka
        Serial.println("PINTU 1 TERBUKA");
        myservo.write(0);
        digitalWrite(2, HIGH);
      } else {
        // pintu tertutup
        Serial.println("PINTU 1 TERTUTUP");
        myservo.write(180);
        digitalWrite(2, LOW);
      }
    } else {
      // 1
      if (jarak < JARAK_BATAS) {
        myservo.write(180);
        digitalWrite(2, LOW);
      } else {
        myservo.write(0);
        digitalWrite(2, HIGH);
      }
      Serial.print("JARAK PINTU 1 = ");
      Serial.println(jarak);
      delay(15);
    }

    float jarak2 = read_srf(pintriger2, pinecho2);
    Firebase.set(fbdo, "controls/pintu_2/ketinggian_air", jarak2);
    json.set("ketinggian_air", jarak2);
    json.set("tanggal/.sv", "timestamp");
    json.set("no_pintu", "pintu_2");
    Firebase.push(fbdo, "ketinggian_air", json);
    Firebase.getString(fbdo, "controls/pintu_2/mode");
    if (fbdo.stringData() == "manual") {
      Firebase.getBool(fbdo, "controls/pintu_2/status");
      if (fbdo.boolData()) {
        Serial.println("PINTU 2 TERBUKA");
        myservo2.write(180);
        digitalWrite(4, HIGH);
      } else {
        Serial.println("PINTU 2 TERTUTUP");
        myservo2.write(0);
        digitalWrite(4, LOW);
      }
    } else {
      // 2
      if (jarak2 < JARAK_BATAS) {
        Serial.println("PINTU 2 TERBUKA");
        myservo2.write(0);
        digitalWrite(4, LOW);
      } else {
        Serial.println("PINTU 2 TERTUTUP");
        myservo2.write(180);
        digitalWrite(4, HIGH);
      }
      Serial.print("JARAK PINTU 2 = ");
      Serial.println(jarak2);
      delay(15);
    }

    float jarak3 = read_srf(pintriger3, pinecho3);
    Firebase.set(fbdo, "controls/pintu_3/ketinggian_air", jarak3);
    json.set("ketinggian_air", jarak3);
    json.set("tanggal/.sv", "timestamp");
    json.set("no_pintu", "pintu_3");
    Firebase.push(fbdo, "ketinggian_air", json);
    Firebase.getString(fbdo, "controls/pintu_3/mode");
    if (fbdo.stringData() == "manual") {
      Firebase.getBool(fbdo, "controls/pintu_3/status");
      if (fbdo.boolData()) {
        Serial.println("PINTU 3 TERBUKA");
        myservo3.write(0);
        digitalWrite(15, HIGH);
      } else {
        Serial.println("PINTU 3 TERTUTUP");
        myservo3.write(180);
        digitalWrite(15, LOW);
      }
    } else {
      // 3
      Serial.println("PINTU 3 TERBUKA");
      if (jarak3 < JARAK_BATAS) {
        myservo3.write(180);
        digitalWrite(15, LOW);
      } else {
        Serial.println("PINTU 3 TERTUTUP");
        myservo3.write(0);
        digitalWrite(15, HIGH);
      }
      Serial.print("JARAK PINTU 3 = ");
      Serial.println(jarak3);
      delay(15);
    }

    float jarak4 = read_srf(pintriger4, pinecho4);
    Firebase.set(fbdo, "controls/pintu_4/ketinggian_air", jarak4);
    json.set("ketinggian_air", jarak4);
    json.set("tanggal/.sv", "timestamp");
    json.set("no_pintu", "pintu_4");
    Firebase.push(fbdo, "ketinggian_air", json);
    Firebase.getString(fbdo, "controls/pintu_4/mode");
    if (fbdo.stringData() == "manual") {
      Firebase.getBool(fbdo, "controls/pintu_4/status");
      if (fbdo.boolData()) {
        Serial.println("PINTU 4 TERBUKA");
        myservo4.write(0);
        digitalWrite(33, HIGH);
      } else {
        Serial.println("PINTU 4 TERTUTUP");
        myservo4.write(180);
        digitalWrite(33, LOW);
      }
    } else {
      // 4
      if (jarak4 < JARAK_BATAS) {
        Serial.println("PINTU 4 TERBUKA");
        myservo4.write(180);
        digitalWrite(33, LOW);
      } else {
        Serial.println("PINTU 4 TERTUTUP");
        myservo4.write(0);
        digitalWrite(33, HIGH);
      }
      Serial.print("JARAK PINTU 4 = ");
      Serial.println(jarak4);
      delay(15);
    }
  }
}
