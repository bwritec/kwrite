<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Debug\Toolbar\Collectors\Database;
    use CodeIgniter\Debug\Toolbar\Collectors\Events;
    use CodeIgniter\Debug\Toolbar\Collectors\Files;
    use CodeIgniter\Debug\Toolbar\Collectors\Logs;
    use CodeIgniter\Debug\Toolbar\Collectors\Routes;
    use CodeIgniter\Debug\Toolbar\Collectors\Timers;
    use CodeIgniter\Debug\Toolbar\Collectors\Views;


    /**
     * --------------------------------------------------------------------------
     * Debug Toolbar
     * --------------------------------------------------------------------------
     *
     * A Barra de Ferramentas de Depuração fornece uma maneira
     * de visualizar informações sobre o desempenho e o estado
     * do seu aplicativo durante a exibição da página. Por padrão,
     * ela NÃO será exibida em ambientes de produção e só será
     * exibida se `CI_DEBUG` for true, pois, caso contrário, não
     * há muito o que exibir.
     */
    class Toolbar extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Toolbar Collectors
         * --------------------------------------------------------------------------
         *
         * Lista de coletores da barra de ferramentas que serão
         * chamados quando a Barra de Ferramentas de Depuração
         * for iniciada e coletar dados.
         *
         * @var list<class-string>
         */
        public array $collectors = [
            Timers::class,
            Database::class,
            Logs::class,
            Views::class,
            // \CodeIgniter\Debug\Toolbar\Collectors\Cache::class,
            Files::class,
            Routes::class,
            Events::class,
        ];

        /**
         * --------------------------------------------------------------------------
         * Collect Var Data
         * --------------------------------------------------------------------------
         *
         * Se definido como false, os dados das visualizações não
         * serão coletados. Isso é útil para evitar alto consumo
         * de memória quando muitos dados são passados para a
         * visualização.
         */
        public bool $collectVarData = true;

        /**
         * --------------------------------------------------------------------------
         * Max History
         * --------------------------------------------------------------------------
         *
         * `$maxHistory` define um limite para o número de
         * solicitações anteriores que são armazenadas, ajudando
         * a conservar o espaço em disco usado para armazená-las.
         * Você pode definir como 0 (zero) para não armazenar
         * nenhum histórico ou -1 para histórico ilimitado.
         */
        public int $maxHistory = 20;

        /**
         * --------------------------------------------------------------------------
         * Toolbar Views Path
         * --------------------------------------------------------------------------
         *
         * O caminho completo para as visualizações usadas pela
         * barra de ferramentas. Este caminho DEVE terminar com
         * uma barra.
         */
        public string $viewsPath = SYSTEMPATH . 'Debug/Toolbar/Views/';

        /**
         * --------------------------------------------------------------------------
         * Max Queries
         * --------------------------------------------------------------------------
         *
         * Se o Coletor de Banco de Dados estiver ativado, ele
         * registrará todas as consultas geradas pelo sistema
         * para que possam ser exibidas na linha do tempo da
         * barra de ferramentas e no registro de consultas.
         * Isso pode causar problemas de memória em alguns casos
         * com centenas de consultas.
         *
         * `$maxQueries` Define a quantidade máxima de consultas
         *               que serão armazenadas.
         */
        public int $maxQueries = 100;

        /**
         * --------------------------------------------------------------------------
         * Watched Directories
         * --------------------------------------------------------------------------
         *
         * Contém uma matriz de diretórios que serão monitorados
         * em busca de alterações e usados para determinar se o
         * recurso de recarregamento automático deve recarregar
         * a página ou não. Restringimos os valores para manter
         * o desempenho o mais alto possível.
         *
         * OBSERVAÇÃO: O ROOTPATH será adicionado antes de todos
         *             os valores.
         *
         * @var list<string>
         */
        public array $watchedDirectories = [
            'app',
        ];

        /**
         * --------------------------------------------------------------------------
         * Watched File Extensions
         * --------------------------------------------------------------------------
         *
         * Contém uma matriz de extensões de arquivo que serão
         * monitoradas em busca de alterações e usadas para
         * determinar se o recurso de recarregamento automático
         * deve recarregar a página ou não.
         *
         * @var list<string>
         */
        public array $watchedExtensions = [
            'php',
            'css',
            'js',
            'html',
            'svg',
            'json',
            'env',
        ];
    }
