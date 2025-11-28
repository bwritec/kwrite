<?php

    namespace Config;

    use CodeIgniter\Cache\CacheInterface;
    use CodeIgniter\Cache\Handlers\DummyHandler;
    use CodeIgniter\Cache\Handlers\FileHandler;
    use CodeIgniter\Cache\Handlers\MemcachedHandler;
    use CodeIgniter\Cache\Handlers\PredisHandler;
    use CodeIgniter\Cache\Handlers\RedisHandler;
    use CodeIgniter\Cache\Handlers\WincacheHandler;
    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Cache extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Manipulador Primário
         * --------------------------------------------------------------------------
         *
         * O nome do manipulador preferencial que deve ser usado. Se,
         * por algum motivo, ele não estiver disponível, o manipulador
         * `$backupHandler` será usado em seu lugar.
         */
        public string $handler = 'file';

        /**
         * --------------------------------------------------------------------------
         * Manipulador de backup
         * --------------------------------------------------------------------------
         *
         * O nome do manipulador que será usado caso o primeiro esteja
         * inacessível. Frequentemente, usa-se 'file' aqui, já que o
         * sistema de arquivos está sempre disponível, embora isso
         * nem sempre seja prático para o aplicativo.
         */
        public string $backupHandler = 'dummy';

        /**
         * --------------------------------------------------------------------------
         * Prefixo chave
         * --------------------------------------------------------------------------
         *
         * Essa sequência de caracteres é adicionada a todos os nomes
         * de itens de cache para ajudar a evitar conflitos caso você
         * execute vários aplicativos com o mesmo mecanismo de cache.
         */
        public string $prefix = '';

        /**
         * --------------------------------------------------------------------------
         * TTL padrão
         * --------------------------------------------------------------------------
         *
         * O número padrão de segundos para salvar itens quando nenhum
         * for especificado.
         *
         * AVISO: Isso não é usado pelos manipuladores de framework onde
         * 60 segundos está codificado, mas pode ser útil para projetos e
         * módulos. Isso substituirá o valor codificado em uma versão
         * futura.
         */
        public int $ttl = 60;

        /**
         * --------------------------------------------------------------------------
         * Caracteres Reservados
         * --------------------------------------------------------------------------
         *
         * Uma sequência de caracteres reservados que não serão permitidos
         * em chaves ou tags. Sequências que violarem essa restrição farão
         * com que os manipuladores lancem exceções.
         * Padrão: {}()/\@:
         *
         * OBSERVAÇÃO: A configuração padrão é necessária para a
         * conformidade com o PSR-6.
         */
        public string $reservedCharacters = '{}()/\@:';

        /**
         * --------------------------------------------------------------------------
         * Configurações de arquivo
         * --------------------------------------------------------------------------
         *
         * Se estiver usando o driver de Arquivo, você pode especificar
         * suas preferências de armazenamento de arquivos abaixo.
         *
         * @var array{storePath?: string, mode?: int}
         */
        public array $file = [
            'storePath' => WRITEPATH . 'cache/',
            'mode'      => 0640,
        ];

        /**
         * -------------------------------------------------------------------------
         * Configurações do Memcached
         * -------------------------------------------------------------------------
         *
         * Se você estiver usando os drivers Memcached, pode especificar
         * seus servidores Memcached abaixo.
         *
         * @see https://codeigniter.com/user_guide/libraries/caching.html#memcached
         *
         * @var array{host?: string, port?: int, weight?: int, raw?: bool}
         */
        public array $memcached = [
            'host'   => '127.0.0.1',
            'port'   => 11211,
            'weight' => 1,
            'raw'    => false,
        ];

        /**
         * -------------------------------------------------------------------------
         * Configurações do Redis
         * -------------------------------------------------------------------------
         *
         * Você pode especificar o servidor Redis abaixo, caso esteja
         * usando os drivers Redis ou Predis.
         *
         * @var array{host?: string, password?: string|null, port?: int, timeout?: int, database?: int}
         */
        public array $redis = [
            'host'     => '127.0.0.1',
            'password' => null,
            'port'     => 6379,
            'timeout'  => 0,
            'database' => 0,
        ];

        /**
         * --------------------------------------------------------------------------
         * Manipuladores de cache disponíveis
         * --------------------------------------------------------------------------
         *
         * Esta é uma lista de aliases e nomes de classe de mecanismos
         * de cache. Somente os mecanismos listados aqui podem ser
         * usados.
         *
         * @var array<string, class-string<CacheInterface>>
         */
        public array $validHandlers = [
            'dummy'     => DummyHandler::class,
            'file'      => FileHandler::class,
            'memcached' => MemcachedHandler::class,
            'predis'    => PredisHandler::class,
            'redis'     => RedisHandler::class,
            'wincache'  => WincacheHandler::class,
        ];

        /**
         * --------------------------------------------------------------------------
         * Cache de páginas web: incluir string de consulta no cache
         * --------------------------------------------------------------------------
         *
         * Indica se a string de consulta da URL deve ser considerada
         * ao gerar os arquivos de cache de saída. As opções válidas
         * são:
         *
         *    false = Desabilitado
         *    true  = Quando ativada, essa opção considera todos os
         *            parâmetros de consulta. Observe que isso pode
         *            resultar na geração repetida de vários arquivos
         *            de cache para a mesma página.
         *    ['q'] = Ativado, mas considera apenas a lista especificada
         *            de parâmetros de consulta.
         *
         * @var bool|list<string>
         */
        public $cacheQueryString = false;
    }
