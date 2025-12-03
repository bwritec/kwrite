<?php

    namespace App\Controllers\Auth;

    use App\Controllers\BaseController;
    use App\Models\UserModel;
    use App\Models\PasswordResetModel;


    /**
     *
     */
    class PasswordController extends BaseController
    {
        /**
         *
         */
        public function showForgot()
        {
            return view('auth/forgot_password', [
                "title" => "Esqueceu sua senha"
            ]);
        }

        /**
         *
         */
        public function sendResetLink()
        {
            $email = $this->request->getPost('email');

            $user = (new UserModel())->where('email', $email)->first();

            if (!$user)
            {
                return redirect()->back()->with('error', 'E-mail não encontrado.');
            }

            /**
             * Gerar token
             */
            $token = bin2hex(random_bytes(32));

            /**
             * Salvar token no banco
             */
            $resetModel = new PasswordResetModel();
            $resetModel->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            /**
             * Link de reset
             */
            $link = base_url("reset-password/$token");

            /**
             * Enviar e-mail
             */
            $emailService = \Config\Services::email();
            $emailService->setTo($email);
            $emailService->setSubject('Recupere sua senha');
            $emailService->setMessage("
                <p>Olá, {$user['name']}!</p>
                <p>Clique no link abaixo para redefinir sua senha:</p>
                <p><a href='$link'>$link</a></p>
            ");
            $emailService->send();

            return redirect()->back()->with('success', 'Enviamos um e-mail com instruções.');
        }

        /**
         *
         */
        public function showReset($token)
        {
            return view('auth/reset_password', [
                "title" => "Redefinir senha",
                'token' => $token
            ]);
        }

        /**
         *
         */
        public function resetPassword()
        {
            $token = $this->request->getPost('token');
            $password = $this->request->getPost('password');

            $resetModel = new PasswordResetModel();
            $reset = $resetModel->where('token', $token)->first();

            if (!$reset)
            {
                return redirect()->to('/forgot-password')->with('error', 'Token inválido ou expirado.');
            }

            /**
             * Atualizar a senha
             */
            $userModel = new UserModel();
            $userModel->where('email', $reset['email'])->set([
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ])->update();

            /**
             * Apagar o token usado
             */
            $resetModel->where('token', $token)->delete();

            return redirect()->to('/login')->with('success', 'Senha redefinida com sucesso!');
        }
    }
