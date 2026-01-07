<?php

    namespace App\Filters;

    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;


    class InstallFilter implements FilterInterface
    {
        public function before(RequestInterface $request, $arguments = null)
        {
            $path = service('request')->getPath();

            /**
             * Fazer Migrations e seeds
             */
            if ($path != "install/database/migrate")
            {
                if (env('installer.database.migration') == "0" ||
                    env('installer.database.seeds') == "0")
                {
                    return redirect()->to('/install/database/migrate');
                }
            }

            if ($path != "install/account/admin")
            {
                if (env('installer.account.admin') == "0")
                {
                    return redirect()->to('/install/account/admin');
                }
            }
        }

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
            // Opcional (executa depois do controller)
        }
    }