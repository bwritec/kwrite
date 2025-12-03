<?php

    namespace App\Controllers\Dashboard;

    use App\Controllers\BaseController;


    /**
     *
     */
    class HomeController extends BaseController
    {
        /**
         *
         */
        public function index(): string
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            return view('dashboard/index', [
                'title' => 'Dashboard',
                'user'  => $user
            ]);
        }
    }