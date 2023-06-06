<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PemilikLahanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Pemilik Lahan',
            'email' => 'pemilik_lahan@sistem-irigasi.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];
        $this->db->table('pemilik_lahan')->insert($data);

        $data = [
            'name' => 'Agung Firmansyah',
            'email' => 'agungfirid@gmail.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];

        // Using Query Builder
        $this->db->table('pemilik_lahan')->insert($data);


        $data = [
            'name' => 'Intan Imaniyah',
            'email' => 'intanimaniyah01@gmail.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];

        // Using Query Builder
        $this->db->table('pemilik_lahan')->insert($data);
    }
}
