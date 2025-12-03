<?php

    namespace App\Controllers;


    /**
     *
     */
    class Home extends BaseController
    {
        /**
         *
         */
        public function index(): string
        {
            return view('index', [
                "title" => "Página inicial"
            ]);
        }

        /**
         *
         */
        public function blank(): string
        {
            return view('blank', [
                "title" => "Página em branco"
            ]);
        }
    }
