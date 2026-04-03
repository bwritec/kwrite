<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;


    /**
     *
     */
    class EnvController extends BaseController
    {
        /**
         *
         */
        public function index()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            return view('dashboard/env', [
                "title" => "Variáveis de ambiente"
            ]);
        }

        /**
         *
         */
        public function save()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }
        }

        /**
         * Alterar um valor de uma chave .env
         * 
         * Exemplo:
         *     $this->setEnvValue("app.name", "kwrite");
         *     $this->setEnvValue("app.rate", "25");
         */
        public function setEnvValue($key, $value)
        {
            $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . ".env";

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
