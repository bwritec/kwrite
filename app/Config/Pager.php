<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Pager extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Templates
         * --------------------------------------------------------------------------
         *
         * Os links de paginação são renderizados usando visualizações
         * para configurar sua aparência. Este array contém aliases e os
         * nomes das visualizações a serem usadas ao renderizar os links.
         *
         * Em cada visualização, o objeto Pager estará disponível como
         * $pager e o grupo desejado como $pagerGroup;
         *
         * @var array<string, string>
         */
        public array $templates = [
            'default_full'   => 'CodeIgniter\Pager\Views\default_full',
            'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
            'default_head'   => 'CodeIgniter\Pager\Views\default_head',
            'bootstrap'      => 'App\Views\pagers\bootstrap',
        ];

        /**
         * --------------------------------------------------------------------------
         * Itens por página
         * --------------------------------------------------------------------------
         *
         * O número padrão de resultados exibidos em uma única página.
         */
        public int $perPage = 20;
    }
