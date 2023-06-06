# Tasks

- [x] Login untuk petani
- [x] Logout untuk petani
- [x] Home untuk petani
- [x] Login untuk pemilik lahan
- [x] Logout untuk pemilik lahan
- [x] Home Untuk pemilik lahan
- [x] Hapus Petani
- [x] Edit Petani
- [x] Kontrol Pintu Untuk Petani
- [x] Melihat Daftar Kontrol Untuk Pemilik Lahan
- [x] Ketinggian Air Pintu Irigasi untuk Petani dan Pemilik Lahan

## Petani

| Nama Field | Tipe Data |
| ---------- | --------- |
| id         | INT       |
| name       | VARHCHAR  |
| email      | VARCHAR   |
| password   | VARCHAR   |

## Pemilik Lahan

| Nama Field | Tipe Data |
| ---------- | --------- |
| id         | INT       |
| name       | VARHCHAR  |
| email      | VARCHAR   |
| password   | VARCHAR   |

## Export Query DB

```
mysqldump -u username -p nama_database > nama_file.sql
```
