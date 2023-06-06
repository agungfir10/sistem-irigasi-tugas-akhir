<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Petugas extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'petugas',
            'email' => 'petugas@sistem-irigasi.site',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];
        $this->db->table('petugas')->insert($data);

        $data = [
            'name' => 'Agung Firmansyah',
            'email' => 'agungfirid@gmail.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];

        // Using Query Builder
        $this->db->table('petugas')->insert($data);


        $data = [
            'name' => 'Intan Imaniyah',
            'email' => 'intanimaniyah01@gmail.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];

        // Using Query Builder
        $this->db->table('petugas')->insert($data);
    }
}
