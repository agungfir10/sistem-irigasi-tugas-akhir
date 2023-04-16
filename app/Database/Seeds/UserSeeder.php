<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Petani',
            'email' => 'petani@sistem-irigasi.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];


        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}