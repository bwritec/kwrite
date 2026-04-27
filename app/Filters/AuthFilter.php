<?php

    namespace App\Filters;

    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;


    /**
     *
     */
    class AuthFilter implements FilterInterface
    {
        public function before(RequestInterface $request, $arguments = null)
        {
            /**
             * Verifica se o usuário está logado
             */
            if (!session()->has('user'))
            {
                /**
                 * redireciona para login se não estiver logado
                 */
                return redirect()
                    ->to('/login')
                    ->with('error', 'Você precisa estar logado para acessar essa página.');
            }
        }

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
            /**
             * nada aqui
             */
        }
    }
