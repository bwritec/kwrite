<?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;


    /**
     *
     */
    class CreateProductCategoriesTable extends Migration
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

                'category_id' => [
                    'type' => 'INT',
                    'unsigned' => true
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable('product_categories');
        }

        /**
         *
         */
        public function down()
        {
            $this->forge->dropTable('product_categories');
        }
    }
