<?php

    namespace Config;

    use CodeIgniter\Config\AutoloadConfig;


    /**
     * -------------------------------------------------------------------
     * AUTOLOADER CONFIGURATION
     * -------------------------------------------------------------------
     *
     * Este arquivo define os namespaces e os mapeamentos de classe
     * para que o Autoloader possa encontrar os arquivos conforme
     * necessário.
     *
     * OBSERVAÇÃO: Se você usar uma chave idêntica em $psr4 ou
     *             $classmap, os valores neste arquivo substituirão
     *             os valores do framework.
     *
     * OBSERVAÇÃO: Essa classe é necessária antes da instanciação
     *             do Autoloader e não estende BaseConfig.
     */
    class Autoload extends AutoloadConfig
    {
        /**
         * -------------------------------------------------------------------
         * Namespaces
         * -------------------------------------------------------------------
         * Isso mapeia a localização de quaisquer namespaces em seu
         * aplicativo para sua localização no sistema de arquivos. Esses
         * namespaces são usados pelo carregador automático para localizar
         * arquivos na primeira vez em que são instanciados.
         *
         * O 'Config' (APPPATH . 'Config') e 'CodeIgniter' (SYSTEMPATH)
         * já está mapeado para você.
         *
         * Você pode alterar o nome do namespace 'App' se desejar,
         * mas isso deve ser feito antes de criar quaisquer classes
         * com namespace; caso contrário, você precisará modificar
         * todas essas classes para que isso funcione.
         *
         * @var array<string, list<string>|string>
         */
        public $psr4 = [
            APP_NAMESPACE => APPPATH,
        ];

        /**
         * -------------------------------------------------------------------
         * Class Map
         * -------------------------------------------------------------------
         * O mapa de classes fornece um mapeamento dos nomes das classes
         * e sua localização exata na unidade. As classes carregadas dessa
         * maneira terão um desempenho ligeiramente mais rápido, pois não
         * precisarão ser buscadas em um ou mais diretórios, como aconteceria
         * se fossem carregadas automaticamente por meio de um namespace.
         *
         * Prototype:
         *   $classmap = [
         *       'MyClass'   => '/path/to/class/file.php'
         *   ];
         *
         * @var array<string, string>
         */
        public $classmap = [];

        /**
         * -------------------------------------------------------------------
         * Files
         * -------------------------------------------------------------------
         * O array `files` fornece uma lista de caminhos para arquivos
         * __non-class__ que serão carregados automaticamente. Isso pode
         * ser útil para operações de inicialização ou para carregar
         * funções.
         *
         * Prototype:
         *   $files = [
         *       '/path/to/my/file.php',
         *   ];
         *
         * @var list<string>
         */
        public $files = [];

        /**
         * -------------------------------------------------------------------
         * Helpers
         * -------------------------------------------------------------------
         * Prototype:
         *   $helpers = [
         *       'form',
         *   ];
         *
         * @var list<string>
         */
        public $helpers = [];
    }
