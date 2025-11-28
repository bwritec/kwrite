<?php

    namespace Config;

    use CodeIgniter\Database\Config;


    /**
     * Configuração do banco de dados
     */
    class Database extends Config
    {
        /**
         * O diretório que contém os diretórios Migrations e Seeds.
         */
        public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

        /**
         * Permite escolher qual grupo de conexão usar caso nenhum
         * outro seja especificado.
         */
        public string $defaultGroup = 'default';

        /**
         * A conexão de banco de dados padrão.
         *
         * @var array<string, mixed>
         */
        public array $default = [
            'DSN'          => '',
            'hostname'     => 'localhost',
            'username'     => '',
            'password'     => '',
            'database'     => '',
            'DBDriver'     => 'MySQLi',
            'DBPrefix'     => '',
            'pConnect'     => false,
            'DBDebug'      => true,
            'charset'      => 'utf8mb4',
            'DBCollat'     => 'utf8mb4_general_ci',
            'swapPre'      => '',
            'encrypt'      => false,
            'compress'     => false,
            'strictOn'     => false,
            'failover'     => [],
            'port'         => 3306,
            'numberNative' => false,
            'foundRows'    => false,
            'dateFormat'   => [
                'date'     => 'Y-m-d',
                'datetime' => 'Y-m-d H:i:s',
                'time'     => 'H:i:s',
            ],
        ];

        /**
         *    //
         *    // Exemplo de conexão de banco de dados para SQLite3.
         *    //
         *    // @var array<string, mixed>
         *    //
         *    public array $default = [
         *        'database'    => 'database.db',
         *        'DBDriver'    => 'SQLite3',
         *        'DBPrefix'    => '',
         *        'DBDebug'     => true,
         *        'swapPre'     => '',
         *        'failover'    => [],
         *        'foreignKeys' => true,
         *        'busyTimeout' => 1000,
         *        'synchronous' => null,
         *        'dateFormat'  => [
         *            'date'     => 'Y-m-d',
         *            'datetime' => 'Y-m-d H:i:s',
         *            'time'     => 'H:i:s',
         *        ],
         *    ];
         */

        /**
         *    //
         *    // Exemplo de conexão de banco de dados para PostgreSQL.
         *    //
         *    // @var array<string, mixed>
         *    //
         *    public array $default = [
         *        'DSN'        => '',
         *        'hostname'   => 'localhost',
         *        'username'   => 'root',
         *        'password'   => 'root',
         *        'database'   => 'ci4',
         *        'schema'     => 'public',
         *        'DBDriver'   => 'Postgre',
         *        'DBPrefix'   => '',
         *        'pConnect'   => false,
         *        'DBDebug'    => true,
         *        'charset'    => 'utf8',
         *        'swapPre'    => '',
         *        'failover'   => [],
         *        'port'       => 5432,
         *        'dateFormat' => [
         *            'date'     => 'Y-m-d',
         *            'datetime' => 'Y-m-d H:i:s',
         *            'time'     => 'H:i:s',
         *        ],
         *    ];
         */

        /**
         *    //
         *    // Exemplo de conexão de banco de dados para SQLSRV.
         *    //
         *    // @var array<string, mixed>
         *    //
         *    public array $default = [
         *        'DSN'        => '',
         *        'hostname'   => 'localhost',
         *        'username'   => 'root',
         *        'password'   => 'root',
         *        'database'   => 'ci4',
         *        'schema'     => 'dbo',
         *        'DBDriver'   => 'SQLSRV',
         *        'DBPrefix'   => '',
         *        'pConnect'   => false,
         *        'DBDebug'    => true,
         *        'charset'    => 'utf8',
         *        'swapPre'    => '',
         *        'encrypt'    => false,
         *        'failover'   => [],
         *        'port'       => 1433,
         *        'dateFormat' => [
         *            'date'     => 'Y-m-d',
         *            'datetime' => 'Y-m-d H:i:s',
         *            'time'     => 'H:i:s',
         *        ],
         *    ];
         */

        /**
         *    //
         *    // Exemplo de conexão de banco de dados para OCI8.
         *    //
         *    // Você pode precisar das seguintes variáveis de ambiente:
         *    //   NLS_LANG                = 'AMERICAN_AMERICA.UTF8'
         *    //   NLS_DATE_FORMAT         = 'YYYY-MM-DD HH24:MI:SS'
         *    //   NLS_TIMESTAMP_FORMAT    = 'YYYY-MM-DD HH24:MI:SS'
         *    //   NLS_TIMESTAMP_TZ_FORMAT = 'YYYY-MM-DD HH24:MI:SS'
         *    //
         *    // @var array<string, mixed>
         *    //
         *    public array $default = [
         *        'DSN'        => 'localhost:1521/XEPDB1',
         *        'username'   => 'root',
         *        'password'   => 'root',
         *        'DBDriver'   => 'OCI8',
         *        'DBPrefix'   => '',
         *        'pConnect'   => false,
         *        'DBDebug'    => true,
         *        'charset'    => 'AL32UTF8',
         *        'swapPre'    => '',
         *        'failover'   => [],
         *        'dateFormat' => [
         *            'date'     => 'Y-m-d',
         *            'datetime' => 'Y-m-d H:i:s',
         *            'time'     => 'H:i:s',
         *        ],
         *    ];
         */

        /**
         * Essa conexão com o banco de dados é utilizada ao executar
         * testes de banco de dados do PHPUnit.
         *
         * @var array<string, mixed>
         */
        public array $tests = [
            'DSN'         => '',
            'hostname'    => '127.0.0.1',
            'username'    => '',
            'password'    => '',
            'database'    => ':memory:',
            'DBDriver'    => 'SQLite3',
            'DBPrefix'    => 'db_',  // Necessário para garantir que estamos trabalhando corretamente com os prefixos em produção. NÃO REMOVA PARA DESENVOLVEDORES DE CI.
            'pConnect'    => false,
            'DBDebug'     => true,
            'charset'     => 'utf8',
            'DBCollat'    => '',
            'swapPre'     => '',
            'encrypt'     => false,
            'compress'    => false,
            'strictOn'    => false,
            'failover'    => [],
            'port'        => 3306,
            'foreignKeys' => true,
            'busyTimeout' => 1000,
            'dateFormat'  => [
                'date'     => 'Y-m-d',
                'datetime' => 'Y-m-d H:i:s',
                'time'     => 'H:i:s',
            ],
        ];

        /**
         *
         */
        public function __construct()
        {
            parent::__construct();

            /**
             * Certifique-se de sempre definir o grupo de banco de
             * dados como 'tests' quando estivermos executando um
             * conjunto de testes automatizados, para evitar
             * sobrescrever dados reais acidentalmente.
             */
            if (ENVIRONMENT === 'testing')
            {
                $this->defaultGroup = 'tests';
            }
        }
    }
