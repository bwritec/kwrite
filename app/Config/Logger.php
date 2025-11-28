<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Log\Handlers\FileHandler;
    use CodeIgniter\Log\Handlers\HandlerInterface;


    /**
     *
     */
    class Logger extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Limite de registro de erros
         * --------------------------------------------------------------------------
         *
         * Você pode ativar o registro de erros definindo um limite
         * superior a zero. O limite determina o que será registrado.
         * Quaisquer valores abaixo ou iguais ao limite serão
         * registrados.
         *
         * As opções de limite são:
         *
         * - 0 = Desativa o registro de logs. Registro de erros DESATIVADO.
         * - 1 = Mensagens de emergência - Sistema inutilizável
         * - 2 = Mensagens de alerta - Ação imediata é imprescindível
         * - 3 = Mensagens críticas - Componente da aplicação indisponível, exceção inesperada.
         * - 4 = Erros de tempo de execução - Não exigem ação imediata, mas devem ser monitorados.
         * - 5 = Avisos - Ocorrências excepcionais que não são erros.
         * - 6 = Avisos - Eventos normais, porém significativos.
         * - 7 = Informações - Eventos interessantes, como login de usuários, etc.
         * - 8 = Depuração - Informações detalhadas de depuração.
         * - 9 = Todas as mensagens
         *
         * Você também pode passar um array com níveis de limite
         * para exibir tipos de erro individuais.
         *
         *     array(1, 2, 3, 8) = Emergency, Alert, Critical, e Debug messages
         *
         * Para um site em produção, você normalmente habilitará
         * o nível Crítico ou superior (3) para registro, caso
         * contrário, seus arquivos de log ficarão cheios muito
         * rapidamente.
         *
         * @var int|list<int>
         */
        public $threshold = (ENVIRONMENT === 'production') ? 4 : 9;

        /**
         * --------------------------------------------------------------------------
         * Formato de data para registros
         * --------------------------------------------------------------------------
         *
         * Cada item registrado possui uma data associada. Você
         * pode usar códigos de data PHP para definir sua própria
         * formatação de data.
         */
        public string $dateFormat = 'Y-m-d H:i:s';

        /**
         * --------------------------------------------------------------------------
         * Manipuladores de log
         * --------------------------------------------------------------------------
         *
         * O sistema de registro de logs permite a execução de
         * múltiplas ações quando um evento é registrado. Isso
         * é possível graças à possibilidade de utilizar múltiplos
         * Handlers, classes especiais projetadas para gravar o log
         * em seus destinos escolhidos, seja um arquivo no servidor,
         * um serviço em nuvem ou até mesmo o envio de um e-mail para
         * a equipe de desenvolvimento.
         *
         * Cada manipulador é definido pelo nome da classe usada
         * para esse manipulador e DEVE implementar a interface
         * `CodeIgniter\Log\Handlers\HandlerInterface`.
         *
         * O valor de cada chave é um array de itens de configuração
         * que são enviados ao construtor de cada manipulador. O único
         * item de configuração obrigatório é o elemento 'handles', que
         * deve ser um array de níveis de log inteiros. Isso é tratado
         * mais facilmente usando as constantes definidas na
         * classe `Psr\Log\LogLevel`.
         *
         * Os manipuladores são executados na ordem definida nesta
         * matriz, começando pelo manipulador no topo e continuando
         * para baixo.
         *
         * @var array<class-string<HandlerInterface>, array<string, int|list<string>|string>>
         */
        public array $handlers = [
            /**
             * --------------------------------------------------------------------
             * File Handler
             * --------------------------------------------------------------------
             */
            FileHandler::class => [
                /**
                 * Os níveis de registro que este manipulador irá processar.
                 */
                'handles' => [
                    'critical',
                    'alert',
                    'emergency',
                    'debug',
                    'error',
                    'info',
                    'notice',
                    'warning',
                ],

                /**
                 * A extensão de nome de arquivo padrão para arquivos
                 * de log. A extensão 'php' permite proteger os arquivos
                 * de log por meio de scripts básicos, quando eles forem
                 * armazenados em um diretório de acesso público.
                 *
                 * OBSERVAÇÃO: Deixar em branco fará com que o valor
                 *             padrão seja 'log'.
                 */
                'fileExtension' => '',

                /**
                 * As permissões do sistema de arquivos a serem aplicadas
                 * aos arquivos de log recém-criados.
                 *
                 * IMPORTANTE: Este valor DEVE ser um número inteiro (sem
                 *             aspas) e você DEVE usar a notação octal (ou
                 *             seja, 0700, 0644, etc.).
                 */
                'filePermissions' => 0644,

                /**
                 * Caminho do diretório de registro
                 *
                 * Por padrão, os registros são gravados em WRITEPATH . 'logs/'.
                 * Especifique um destino diferente aqui, se desejar.
                 */
                'path' => '',
            ],

            /**
             * O ChromeLoggerHandler requer o uso do navegador
             * Chrome e da extensão ChromeLogger. Remova o
             * comentário deste bloco para utilizá-lo.
             */
            // 'CodeIgniter\Log\Handlers\ChromeLoggerHandler' => [
            //     /**
            //      * Os níveis de registro que este manipulador irá processar.
            //      */
            //     'handles' => [
            //         'critical',
            //         'alert',
            //         'emergency',
            //         'debug',
            //         'error',
            //         'info',
            //         'notice',
            //         'warning'
            //     ],
            // ],

            /**
             * O ErrorlogHandler grava os logs na função nativa
             * do PHP `error_log()`. Descomente este bloco para
             * usá-lo.
             */
            // 'CodeIgniter\Log\Handlers\ErrorlogHandler' => [
            //     /* The log levels this handler can handle. */
            //     'handles' => [
            //         'critical',
            //         'alert',
            //         'emergency',
            //         'debug',
            //         'error',
            //         'info',
            //         'notice',
            //         'warning'
            //     ],
            //
            //     /**
            //      * O tipo de mensagem para onde o erro deve ser direcionado. Pode ser 0 ou 4, ou use o
            //      * class constants: `ErrorlogHandler::TYPE_OS` (0) ou `ErrorlogHandler::TYPE_SAPI` (4)
            //      */
            //     'messageType' => 0,
            // ],
        ];
    }
