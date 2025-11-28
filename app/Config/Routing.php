<?php

    /**
     * Este arquivo faz parte do framework CodeIgniter 4.
     *
     * (c) CodeIgniter Foundation <admin@codeigniter.com>
     *
     * For the full copyright and license information, please view
     * the LICENSE file that was distributed with this source code.
     */

    namespace Config;

    use CodeIgniter\Config\Routing as BaseRouting;


    /**
     * Configuração de roteamento
     */
    class Routing extends BaseRouting
    {
        /**
         * Para rotas definidas.
         * Uma matriz de arquivos que contém definições de rotas.
         * Os arquivos de rotas são lidos em ordem, sendo que a
         * primeira correspondência encontrada tem precedência.
         *
         * Default: APPPATH . 'Config/Routes.php'
         *
         * @var list<string>
         */
        public array $routeFiles = [
            APPPATH . 'Config/Routes.php',
        ];

        /**
         * Para rotas definidas e roteamento automático.
         * O namespace padrão a ser usado para controladores
         * quando nenhum outro namespace for especificado.
         *
         * Default: 'App\Controllers'
         */
        public string $defaultNamespace = 'App\Controllers';

        /**
         * Para roteamento automático.
         * O controlador padrão a ser usado quando nenhum outro
         * controlador for especificado.
         *
         * Default: 'Home'
         */
        public string $defaultController = 'Home';

        /**
         * Para rotas definidas e roteamento automático.
         * O método padrão a ser chamado no controlador quando
         * nenhum outro método foi definido na rota.
         *
         * Default: 'index'
         */
        public string $defaultMethod = 'index';

        /**
         * Para roteamento automático.
         * Indica se os hífens em URIs de controladores/métodos
         * devem ser convertidos em sublinhados. Isso é especialmente
         * útil ao usar o roteamento automático.
         *
         * Default: false
         */
        public bool $translateURIDashes = false;

        /**
         * Define a classe/método que deve ser chamado caso o
         * roteamento não encontre uma correspondência. Pode ser
         * o nome do controlador/método, como: Users::index
         *
         * Essa configuração é passada para a classe Router e tratada lá.
         *
         * Se você deseja usar um closure, precisará configurá-lo no
         * arquivo de rotas chamando:
         *
         * $routes->set404Override(function() {
         *    // Do something here
         * });
         *
         * Exemplo:
         *  public $override404 = 'App\Errors::show404';
         */
        public ?string $override404 = null;

        /**
         * Se definido como TRUE, o sistema tentará encontrar
         * uma correspondência entre o URI e os Controladores,
         * comparando cada segmento com pastas/arquivos em
         * APPPATH/Controllers, caso não encontre uma
         * correspondência com as rotas definidas.
         *
         * Se definido como FALSE, a busca será interrompida
         * e o roteamento automático NÃO será realizado.
         */
        public bool $autoRoute = false;

        /**
         * Para rotas definidas.
         * Se definido como TRUE, habilitará o uso da opção
         * 'prioritize' ao definir rotas.
         *
         * Default: false
         */
        public bool $prioritize = false;

        /**
         * Para rotas definidas.
         * Se TRUE, Vários segmentos de URI correspondentes
         * serão passados como um único parâmetro.
         *
         * Default: false
         */
        public bool $multipleSegmentsOneParam = false;

        /**
         * Para roteamento automático (Melhorou).
         * Mapa de segmentos URI e espaços de nomes.
         *
         * A chave é o primeiro segmento da URI. O valor é o
         * namespace do controlador.
         * Por exemplo,
         *   [
         *       'blog' => 'Acme\Blog\Controllers',
         *   ]
         *
         * @var array<string, string>
         */
        public array $moduleRoutes = [];

        /**
         * Para roteamento automático (aprimorado).
         * Indica se os hífens nas URIs de controlador/método devem
         * ser convertidos para CamelCase.
         * Por exemplo, blog-controller -> BlogController
         *
         * Se você ativar isso, $translateURIDashes é ignorado.
         *
         * Default: false
         */
        public bool $translateUriToCamelCase = true;
    }
