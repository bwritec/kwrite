<?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;


    /**
     *
     */
    class CreateNewslettersTable extends Migration
    {
        /**
         *
         */
        public function up()
        {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true
                ],

                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 75,
                    'unique' => true,
                    'null' => false
                ]
            ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable('newsletters');
        }

        /**
         *
         */
        public function down()
        {
            $this->forge->dropTable('newsletters');
        }
    }
