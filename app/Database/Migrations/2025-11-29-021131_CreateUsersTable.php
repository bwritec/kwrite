<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 75,
                'unique' => true,
                'null' => false
            ],

            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],

            'admin' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
