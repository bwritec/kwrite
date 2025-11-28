<?php

    namespace Config;

    use CodeIgniter\Modules\Modules as BaseModules;


    /**
     * Configuração de Módulos.
     *
     * OBSERVAÇÃO: Essa classe é necessária antes da instanciação
     *             do Autoloader e não estende BaseConfig.
     */
    class Modules extends BaseModules
    {
        /**
         * --------------------------------------------------------------------------
         * Enable Auto-Discovery?
         * --------------------------------------------------------------------------
         *
         * Se true, Nesse caso, a descoberta automática ocorrerá
         * em todos os elementos listados em `$aliases` abaixo. Se
         * definido como false, nenhuma descoberta automática ocorrerá,
         * proporcionando um pequeno aumento de desempenho.
         *
         * @var bool
         */
        public $enabled = true;

        /**
         * --------------------------------------------------------------------------
         * Enable Auto-Discovery Within Composer Packages?
         * --------------------------------------------------------------------------
         *
         * Se true, então, a descoberta automática ocorrerá em
         * todos os namespaces carregados pelo Composer, bem
         * como nos namespaces configurados localmente.
         *
         * @var bool
         */
        public $discoverInComposer = true;

        /**
         * Lista de pacotes do Composer para Auto-Discovery
         * Essa configuração é opcional.
         *
         * Por exemplo:
         *   [
         *       'only' => [
         *           // Liste todos os pacotes para descoberta automática.
         *           'codeigniter4/shield',
         *       ],
         *   ]
         *   ou
         *   [
         *       'exclude' => [
         *           // Liste os pacotes a serem excluídos.
         *           'pestphp/pest',
         *       ],
         *   ]
         *
         * @var array{only?: list<string>, exclude?: list<string>}
         */
        public $composerPackages = [];

        /**
         * --------------------------------------------------------------------------
         * Auto-Discovery Rules
         * --------------------------------------------------------------------------
         *
         * Lista de aliases de todas as classes de descoberta que
         * estarão ativas e serão usadas durante a solicitação de
         * aplicativo atual.
         *
         * Caso não esteja listado, serão utilizados apenas os
         * elementos básicos da aplicação.
         *
         * @var list<string>
         */
        public $aliases = [
            'events',
            'filters',
            'registrars',
            'routes',
            'services',
        ];
    }
