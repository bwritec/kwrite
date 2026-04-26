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

        $admin_theme = env('app.theme.system');

        return view('system/'. $admin_theme .'/dashboard/index', [
            'title' => 'Dashboard',
            'page' => 'dashboard.index',
            'user'  => $user
        ]);
    }
}
