<?php

    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\UserModel;


    /**
     *
     */
    class AuthController extends BaseController
    {
        /**
         *
         */
        public function register()
        {
            return view('auth/register', [
                'title'  => 'Criar Conta',
                'errors' => session()->getFlashdata('errors')
            ]);
        }

        /**
         *
         */
        public function store()
        {
            helper(['form']);

            $validation = \Config\Services::validation();

            $validation->setRules([
                'name'     => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ]);

            if (!$validation->withRequest($this->request)->run())
            {
                return redirect()->back()
                    ->with('errors', $validation->getErrors())
                    ->withInput();
            }

            $userModel = new UserModel();

            $userModel->insert([
                'name'       => $this->request->getPost('name'),
                'email'      => $this->request->getPost('email'),
                'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'admin'      => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/login')->with('success', 'Conta criada com sucesso! Faça login.');
        }

        /**
         * LOGIN
         */
        public function login()
        {
            return view('auth/login', [
                'title'  => 'Login',
                'errors' => session()->getFlashdata('errors')
            ]);
        }

        /**
         *
         */
        public function auth()
        {
            helper(['form']);

            $validation = \Config\Services::validation();

            $validation->setRules([
                'email'    => 'required|valid_email',
                'password' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run())
            {
                return redirect()->back()
                    ->with('errors', $validation->getErrors())
                    ->withInput();
            }

            $userModel = new UserModel();

            $user = $userModel->where('email', $this->request->getPost('email'))->first();

            if (!$user || !password_verify($this->request->getPost('password'), $user['password'])) {
                return redirect()->back()
                    ->with('errors', ['login' => 'E-mail ou senha incorretos.'])
                    ->withInput();
            }

            /**
             * Salva sessão
             */
            session()->set('user', [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'admin' => $user['admin']
            ]);

            return redirect()->to('/dashboard');
        }

        /**
         *
         */
        public function logout()
        {
            session()->destroy();

            return redirect()->to('/login');
        }
    }
