<?php

    namespace App\Models;

    use CodeIgniter\Model;


    /**
     *
     */
    class UserModel extends Model
    {
        /**
         *
         */
        protected $table = 'users';

        /**
         *
         */
        protected $primaryKey = 'id';

        /**
         *
         */
        protected $allowedFields = [
            'name',
            'email',
            'password',
            'admin',
            'created_at'
        ];

        /**
         *
         */
        protected $returnType = 'array';

        /**
         *
         */
        public $useTimestamps = false;
    }
