<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Security extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * CSRF Protection Method
         * --------------------------------------------------------------------------
         *
         * Método de proteção contra falsificação de solicitação
         * entre sites (CSRF).
         *
         * @var string 'cookie' ou 'session'
         */
        public string $csrfProtection = 'cookie';

        /**
         * --------------------------------------------------------------------------
         * CSRF Token Randomization
         * --------------------------------------------------------------------------
         *
         * Para maior segurança, randomize o token CSRF.
         */
        public bool $tokenRandomize = false;

        /**
         * --------------------------------------------------------------------------
         * CSRF Token Name
         * --------------------------------------------------------------------------
         *
         * Nome do token para proteção contra Cross Site
         * Request Forgery (CSRF).
         */
        public string $tokenName = 'csrf_test_name';

        /**
         * --------------------------------------------------------------------------
         * CSRF Header Name
         * --------------------------------------------------------------------------
         *
         * Nome do cabeçalho para proteção contra Cross
         * Site Request Forgery (CSRF).
         */
        public string $headerName = 'X-CSRF-TOKEN';

        /**
         * --------------------------------------------------------------------------
         * CSRF Cookie Name
         * --------------------------------------------------------------------------
         *
         * Nome do cookie para proteção contra falsificação
         * de solicitação entre sites (CSRF).
         */
        public string $cookieName = 'csrf_cookie_name';

        /**
         * --------------------------------------------------------------------------
         * CSRF Expires
         * --------------------------------------------------------------------------
         *
         * Tempo de expiração do cookie de proteção contra
         * Cross-Site Request Forgery.
         *
         * O valor padrão é de duas horas (em segundos).
         */
        public int $expires = 7200;

        /**
         * --------------------------------------------------------------------------
         * CSRF Regenerate
         * --------------------------------------------------------------------------
         *
         * Regenerar o token CSRF a cada submissão.
         */
        public bool $regenerate = true;

        /**
         * --------------------------------------------------------------------------
         * CSRF Redirect
         * --------------------------------------------------------------------------
         *
         * Redirecionar para a página anterior com mensagem
         * de erro em caso de falha.
         *
         * @see https://codeigniter4.github.io/userguide/libraries/security.html#redirection-on-failure
         */
        public bool $redirect = (ENVIRONMENT === 'production');
    }
