<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Debug\ExceptionHandler;
    use CodeIgniter\Debug\ExceptionHandlerInterface;
    use Psr\Log\LogLevel;
    use Throwable;


    /**
     * Configure o funcionamento do manipulador de exceções.
     */
    class Exceptions extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * LOG EXCEPTIONS?
         * --------------------------------------------------------------------------
         * Se true, as exceções serão registradas através
         * de Services::Log.
         *
         * Default: true
         */
        public bool $log = true;

        /**
         * --------------------------------------------------------------------------
         * NÃO REGISTRAR CÓDIGOS DE STATUS
         * --------------------------------------------------------------------------
         * Os códigos de status aqui apresentados NÃO serão registrados
         * se o registro de logs estiver ativado. Por padrão, apenas as
         * exceções 404 (Página não encontrada) são ignoradas.
         *
         * @var list<int>
         */
        public array $ignoreCodes = [404];

        /**
         * --------------------------------------------------------------------------
         * Caminho das Exibições de Erro
         * --------------------------------------------------------------------------
         * Este é o caminho para o diretório que contém os
         * diretórios 'cli' e 'html', que armazenam as
         * visualizações usadas para gerar erros.
         *
         * Default: APPPATH.'Views/errors'
         */
        public string $errorViewPath = APPPATH . 'Views/errors';

        /**
         * --------------------------------------------------------------------------
         * OCULTAR DO RASTREAMENTO DE DEPURAÇÃO
         * --------------------------------------------------------------------------
         * Quaisquer dados que você queira ocultar do rastreamento
         * de depuração. Para especificar dois níveis, use "/" para
         * separá-los.
         * ex. ['server', 'setup/password', 'secret_token']
         *
         * @var list<string>
         */
        public array $sensitiveDataInTrace = [];

        /**
         * --------------------------------------------------------------------------
         * DECIDIR SE DEVE LANÇAR UMA EXCEÇÃO EM CASO DE ERROS OBSOLETOS
         * --------------------------------------------------------------------------
         * Se definido como `true`, apenas os erros DEPRECATED
         * serão registrados e nenhuma exceção será lançada. Essa
         * opção também funciona para avisos de obsolescência feitos
         * pelo usuário.
         */
        public bool $logDeprecations = true;

        /**
         * --------------------------------------------------------------------------
         * LIMITE DE NÍVEL DE REGISTRO PARA DEPRECIAÇÕES
         * --------------------------------------------------------------------------
         * Se `$logDeprecations` estiver definido como `true`,
         * isso define o nível de log no qual a depreciação será
         * registrada. Este deve ser um dos níveis de log reconhecidos
         * pelo PSR-3.
         *
         * O parâmetro `Config\Logger::$threshold` relacionado deve
         * ser ajustado, se necessário, para capturar o registro das
         * depreciações.
         */
        public string $deprecationLogLevel = LogLevel::WARNING;

        /**
         * --------------------------------------------------------------------------
         * DEFINIR OS MANIPULADORES UTILIZADOS
         * --------------------------------------------------------------------------
         * Dado o código de status HTTP, retorna o manipulador de
         * exceção que deve ser usado para lidar com esse erro. Por
         * padrão, ele executará o manipulador padrão do CodeIgniter
         * e exibirá as informações de erro no formato esperado para
         * solicitações CLI, HTTP ou AJAX, conforme determinado
         * por `is_cli()` e o formato de resposta esperado.
         *
         * É possível retornar manipuladores personalizados caso
         * deseje lidar com um ou mais códigos de erro específicos,
         * como:
         *
         *      if (in_array($statusCode, [400, 404, 500]))
         *      {
         *          return new \App\Libraries\MyExceptionHandler();
         *      }
         *
         *      if ($exception instanceOf PageNotFoundException)
         *      {
         *          return new \App\Libraries\MyExceptionHandler();
         *      }
         */
        public function handler(int $statusCode, Throwable $exception): ExceptionHandlerInterface
        {
            return new ExceptionHandler($this);
        }
    }
