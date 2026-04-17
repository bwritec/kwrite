<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user)
        {
            return redirect()->to('/login');
        }

        return view('system/dashboard/index', [
            'title' => 'Dashboard',
            'user'  => $user
        ]);
    }
}
