<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Email extends BaseConfig
    {
        /**
         *
         */
        public string $fromEmail  = '';

        /**
         *
         */
        public string $fromName   = '';

        /**
         *
         */
        public string $recipients = '';

        /**
         * O "user agent"
         */
        public string $userAgent = 'CodeIgniter';

        /**
         * O protocolo de envio de e-mail: mail, sendmail, smtp
         */
        public string $protocol = 'mail';

        /**
         * O caminho do servidor para Sendmail.
         */
        public string $mailPath = '/usr/sbin/sendmail';

        /**
         * Nome do host do servidor SMTP
         */
        public string $SMTPHost = '';

        /**
         * Nome de usuário SMTP
         */
        public string $SMTPUser = '';

        /**
         * Senha SMTP
         */
        public string $SMTPPass = '';

        /**
         * Porta SMTP
         */
        public int $SMTPPort = 25;

        /**
         * Tempo limite SMTP (em segundos)
         */
        public int $SMTPTimeout = 5;

        /**
         * Habilitar conexões SMTP persistentes
         */
        public bool $SMTPKeepAlive = false;

        /**
         * Criptografia SMTP.
         *
         * @var string '', 'tls' ou 'ssl'. 'tls' irá enviar um
         *             comando STARTTLS para o servidor. 'ssl'
         *             significa SSL implícito. A conexão na
         *             porta 465 deve definir isso como ''.
         */
        public string $SMTPCrypto = 'tls';

        /**
         * Ativar quebra automática de linha
         */
        public bool $wordWrap = true;

        /**
         * Contagem de caracteres para quebra de linha
         */
        public int $wrapChars = 76;

        /**
         * Tipo de e-mail: 'texto' ou 'html'
         */
        public string $mailType = 'text';

        /**
         * Conjunto de caracteres (utf-8, iso-8859-1, etc.)
         */
        public string $charset = 'UTF-8';

        /**
         * Se deseja validar o endereço de e-mail
         */
        public bool $validate = false;

        /**
         * Prioridade de e-mail. 1 = highest. 5 = lowest. 3 = normal
         */
        public int $priority = 3;

        /**
         * Caractere de nova linha. (Use “\r\n” para cumprir com RFC 822)
         */
        public string $CRLF = "\r\n";

        /**
         * Caractere de nova linha. (Use “\r\n” para cumprir com RFC 822)
         */
        public string $newline = "\r\n";

        /**
         * Ativar o modo de lote BCC.
         */
        public bool $BCCBatchMode = false;

        /**
         * Número de emails em cada lote de BCC
         */
        public int $BCCBatchSize = 200;

        /**
         * Ativar notificação por mensagem do servidor
         */
        public bool $DSN = false;
    }
