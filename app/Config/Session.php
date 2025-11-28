<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Session\Handlers\BaseHandler;
    use CodeIgniter\Session\Handlers\FileHandler;


    /**
     *
     */
    class Session extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Session Driver
         * --------------------------------------------------------------------------
         *
         * O driver de armazenamento de sessão a ser usado:
         * - `CodeIgniter\Session\Handlers\FileHandler`
         * - `CodeIgniter\Session\Handlers\DatabaseHandler`
         * - `CodeIgniter\Session\Handlers\MemcachedHandler`
         * - `CodeIgniter\Session\Handlers\RedisHandler`
         *
         * @var class-string<BaseHandler>
         */
        public string $driver = FileHandler::class;

        /**
         * --------------------------------------------------------------------------
         * Session Cookie Name
         * --------------------------------------------------------------------------
         *
         * O nome do cookie de sessão deve conter apenas caracteres [0-9a-z_-]
         */
        public string $cookieName = 'ci_session';

        /**
         * --------------------------------------------------------------------------
         * Session Expiration
         * --------------------------------------------------------------------------
         *
         * O número de SEGUNDOS que você deseja que a sessão dure.
         * Definir como 0 (zero) significa que expira quando o
         * navegador for fechado.
         */
        public int $expiration = 7200;

        /**
         * --------------------------------------------------------------------------
         * Session Save Path
         * --------------------------------------------------------------------------
         *
         * O local para salvar as sessões depende do driver.
         *
         * Para o driver 'files', trata-se do caminho para um diretório gravável.
         * AVISO: Somente caminhos absolutos são suportados!
         *
         * Para o driver 'database', trata-se do nome de uma tabela.
         * Por favor, leia o manual para obter informações sobre o
         * formato com outros drivers de sessão.
         *
         * IMPORTANTE: É OBRIGATÓRIO definir um caminho de
         * salvamento válido!
         */
        public string $savePath = WRITEPATH . 'session';

        /**
         * --------------------------------------------------------------------------
         * Session Match IP
         * --------------------------------------------------------------------------
         *
         * Indica se o endereço IP do usuário deve ser comparado
         * ao ler os dados da sessão.
         *
         * AVISO: Se você estiver usando o driver de banco de
         *        dados, não se esqueça de atualizar a CHAVE
         *        PRIMÁRIA da sua tabela de sessão ao alterar
         *        essa configuração.
         */
        public bool $matchIP = false;

        /**
         * --------------------------------------------------------------------------
         * Session Time to Update
         * --------------------------------------------------------------------------
         *
         * Quantos segundos se passam entre a regeneração do ID da sessão pelo CI?
         */
        public int $timeToUpdate = 300;

        /**
         * --------------------------------------------------------------------------
         * Session Regenerate Destroy
         * --------------------------------------------------------------------------
         *
         * Indica se os dados da sessão associados ao ID da sessão antiga
         * devem ser destruídos ao regenerar automaticamente o ID da sessão.
         * Quando definido como FALSE, os dados serão posteriormente excluídos
         * pelo coletor de lixo.
         */
        public bool $regenerateDestroy = false;

        /**
         * --------------------------------------------------------------------------
         * Session Database Group
         * --------------------------------------------------------------------------
         *
         * Grupo DB para a sessão do banco de dados.
         */
        public ?string $DBGroup = null;

        /**
         * --------------------------------------------------------------------------
         * Lock Retry Interval (microseconds)
         * --------------------------------------------------------------------------
         *
         * Isso é usado para o RedisHandler.
         *
         * Time (microseconds) aguardar caso o bloqueio não possa ser obtido.
         * O padrão é 100,000 microseconds (= 0.1 seconds).
         */
        public int $lockRetryInterval = 100_000;

        /**
         * --------------------------------------------------------------------------
         * Lock Max Retries
         * --------------------------------------------------------------------------
         *
         * Isto é usado para RedisHandler.
         *
         * Número máximo de tentativas de aquisição de bloqueio.
         * O valor padrão é 300 vezes. Ou seja, o tempo limite de bloqueio
         * é de aproximadamente 30 (0.1 * 300) segundos.
         */
        public int $lockMaxRetries = 300;
    }
