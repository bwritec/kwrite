<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;


    /**
     * Controller para instalação do sistema.
     */
    class InstallController extends Controller
    {
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
