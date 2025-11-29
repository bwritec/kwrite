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
            return view('index');
        }

        /**
         *
         */
        public function blank(): string
        {
            return view('blank');
        }
    }
