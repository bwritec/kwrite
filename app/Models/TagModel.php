<?php

    namespace App\Models;

    use CodeIgniter\Model;


    /**
     *
     */
    class TagModel extends Model
    {
        /**
         *
         */
        protected $table = 'tags';

        /**
         *
         */
        protected $primaryKey = 'id';

        /**
         *
         */
        protected $allowedFields = [
            'name',
            'description',
            'created_at'
        ];

        /**
         *
         */
        protected $useTimestamps = false;

        /**
         *
         */
        protected $usePagination = true;

        /**
         *
         */
        protected $returnType = 'array';
    }
