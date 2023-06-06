<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemilikLahan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
                'null' => false,
            ],
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'reset_token_expires_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemilik_lahan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pemilik_lahan');
    }
}
