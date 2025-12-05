<?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;


    /**
     *
     */
    class CreateProductCorreiosTable extends Migration
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

                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true
                ],

                'product_id' => [
                    'type' => 'INT',
                    'unsigned' => true
                ],

                /**
                 * Peso.
                 */
                'weight' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true
                ],

                /**
                 * Comprimento.
                 */
                'length' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true
                ],

                /**
                 * Altura.
                 */
                'height' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true
                ],

                /**
                 * Largura.
                 */
                'width' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true
                ]
            ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable('product_correios');
        }

        /**
         *
         */
        public function down()
        {
            $this->forge->dropTable('product_correios');
        }
    }
