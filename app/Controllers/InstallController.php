<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;
    use App\Models\UserModel;


    /**
     * Controller para instalação do sistema.
     */
    class InstallController extends Controller
    {
        /**
         * Tela para usuario criar uma conta de
         * administrador.
         */
        public function admin()
        {
            if (env('installer.account.admin') == "1")
            {
                return redirect()->to('/');
            }

            $data = array(
                "title" => "Instalação do banco de dados"
            );

            return view("install/admin", $data);
        }

        /**
         * Salvar a conta do usuario.
         */
        public function admin_make()
        {
            if (env('installer.account.admin') == "1")
            {
                return redirect()->to('/');
            }

            $userModel = new UserModel();

            $validation = \Config\Services::validation();
            $validation->setRules([
                'name'  => 'required|min_length[3]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'cpf' => 'required|exact_length[14]|is_unique[users.cpf]|is_cpf',
                'password' => 'required|min_length[6]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return view('install/admin', [
                    'title' => 'Cadastro de Usuário',
                    'errors' => $validation->getErrors(),
                ]);
            }

            $userModel->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'cpf' => preg_replace('/[^0-9]/', '', $this->request->getPost('cpf')),
                'password' => $this->request->getPost('password'),
                'admin' => 1
            ]);

            /**
             * Atualizar o status de admin no .env
             */
            $this->setEnvValue("installer.account.admin", "1");

            return redirect()
                ->to('/install/account/admin')
                ->with('success', 'Usuário cadastrado com sucesso!');
        }

        /**
         * Tela para usuario fazer a instalação.
         */
        public function migrate()
        {
            if (env('installer.database.migration') == "1" &&
                env('installer.database.seeds') == "1")
            {
                return redirect()->to('/');
            }

            $data = array(
                "title" => "Instalação do banco de dados"
            );

            return view("install/migrate", $data);
        }

        /**
         * Faz a instalação das migrations e salva
         * na env
         */
        public function migrate_install()
        {
            if (env('installer.database.migration') == "1" &&
                env('installer.database.seeds') == "1")
            {
                return redirect()->to('/');
            }

            $migrate = \Config\Services::migrations();

            try
            {
                $migrate->latest();

                /**
                 * Atualizar o status de migrations e seeds no .env
                 */
                $this->setEnvValue("installer.database.migration", "1");

                if (env('installer.database.seeds') == "0")
                {
                    /**
                     * Vamos atualizar as seeds.
                     */
                    $seeder = \Config\Database::seeder();
                    $seeder->call('CategorieSeeder');

                    /**
                     * Atualizar o status seeds no .env
                     */
                    $this->setEnvValue("installer.database.seeds", "1");
                }

                /**
                 * Redirecionar para home.
                 */
                return redirect()->to('/');
            } catch (\Throwable $e)
            {
                return $e->getMessage();
            }
        }

        /**
         * Alterar um valor de uma chave .env
         * 
         * Exemplo:
         *     setEnvValue("app.name", "kwrite");
         *     setEnvValue("app.rate", "25");
         */
        public function setEnvValue($key, $value)
        {
            $path = ROOTPATH . '.env';

            if (!file_exists($path))
            {
                return false;
            }

            $value = trim($value);

            $env = file_get_contents($path);

            /**
             * Filtros.
             */
            $env = str_replace("\t", " ", $env);
            $env = str_replace("  ", " ", $env);
            $env = str_replace(" =", "=", $env);
            $env = str_replace("= ", "=", $env);

            /**
             * Verifica se já existe.
             */
            if (preg_match("/^{$key}=.*/m", $env))
            {
                /**
                 * Substitui a linha completa.
                 */
                $env = preg_replace(
                    "/^{$key}=.*/m",
                    "{$key}=\"{$value}\"",
                    $env
                );
            } else
            {
                /**
                 * Adiciona ao final.
                 */
                $env .= "\n{$key}=\"{$value}\"";
            }

            /**
             * Salva de volta
             */
            // file_put_contents($path, $env);

            $f = fopen($path, 'w');
            if ($f === false)
            {
                die('Erro ao abrir o arquivo');
            }

            fwrite($f, $env);
            fclose($f);

            return true;
        }
    }
