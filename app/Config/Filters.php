<?php

    namespace Config;

    use CodeIgniter\Config\Filters as BaseFilters;
    use CodeIgniter\Filters\Cors;
    use CodeIgniter\Filters\CSRF;
    use CodeIgniter\Filters\DebugToolbar;
    use CodeIgniter\Filters\ForceHTTPS;
    use CodeIgniter\Filters\Honeypot;
    use CodeIgniter\Filters\InvalidChars;
    use CodeIgniter\Filters\PageCache;
    use CodeIgniter\Filters\PerformanceMetrics;
    use CodeIgniter\Filters\SecureHeaders;


    /**
     *
     */
    class Filters extends BaseFilters
    {
        /**
         * Configura aliases para classes de filtro para
         * tornar a leitura mais fácil e simples.
         *
         * @var array<string, class-string|list<class-string>>
         *
         * [filter_name => classname]
         * ou [filter_name => [classname1, classname2, ...]]
         */
        public array $aliases = [
            'csrf'          => CSRF::class,
            'toolbar'       => DebugToolbar::class,
            'honeypot'      => Honeypot::class,
            'invalidchars'  => InvalidChars::class,
            'secureheaders' => SecureHeaders::class,
            'cors'          => Cors::class,
            'forcehttps'    => ForceHTTPS::class,
            'pagecache'     => PageCache::class,
            'performance'   => PerformanceMetrics::class,
        ];

        /**
         * Lista de filtros especiais obrigatórios.
         *
         * Os filtros listados aqui são especiais. Eles são aplicados
         * antes e depois de outros tipos de filtros e são sempre
         * aplicados, mesmo que a rota não exista.
         *
         * Os filtros definidos por padrão fornecem funcionalidades
         * do framework. Se forem removidos, essas funções deixarão
         * de funcionar.
         *
         * @see https://codeigniter.com/user_guide/incoming/filters.html#provided-filters
         *
         * @var array{before: list<string>, after: list<string>}
         */
        public array $required = [
            'before' => [
                'forcehttps', // Forçar solicitações seguras globais
                'pagecache',  // Cache de página da web
            ],

            'after' => [
                'pagecache',   // Cache de página da web
                'performance', // Métricas de desempenho
                'toolbar',     // Debug Toolbar
            ],
        ];

        /**
         * Lista de aliases de filtro que são sempre aplicados
         * antes e depois de cada requisição.
         *
         * @var array{
         *     before: array<string, array{except: list<string>|string}>|list<string>,
         *     after: array<string, array{except: list<string>|string}>|list<string>
         * }
         */
        public array $globals = [
            'before' => [
                /**
                 * 'honeypot',
                 * 'csrf',
                 * 'invalidchars',
                 */
            ],

            'after' => [
                /**
                 * 'honeypot',
                 * 'secureheaders',
                 */
            ],
        ];

        /**
         * Lista de aliases de filtro que funcionam em um
         * método HTTP específico (GET, POST, etc.).
         *
         * Exemplo:
         * 'POST' => ['foo', 'bar']
         *
         * Se você usar isso, deve desativar o roteamento automático,
         * pois ele permite que qualquer método HTTP acesse um controlador.
         * Acessar o controlador com um método inesperado pode burlar o filtro.
         *
         * @var array<string, list<string>>
         */
        public array $methods = [];

        /**
         * Lista de aliases de filtro que devem ser executados
         * em quaisquer padrões de URI anteriores ou posteriores.
         *
         * Exemplo:
         * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
         *
         * @var array<string, array<string, list<string>>>
         */
        public array $filters = [];
    }
