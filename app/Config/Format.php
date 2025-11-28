<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Format\JSONFormatter;
    use CodeIgniter\Format\XMLFormatter;


    /**
     *
     */
    class Format extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Formatos de resposta disponíveis
         * --------------------------------------------------------------------------
         *
         * Ao realizar a negociação de conteúdo com a solicitação,
         * estes são os formatos disponíveis que seu aplicativo
         * suporta. Atualmente, isso só é usado com o API\ResponseTrait.
         * Um Formatter válido deve existir para o formato especificado.
         *
         * Esses formatos só são verificados quando os dados passados
         * para o método respond() são um array.
         *
         * @var list<string>
         */
        public array $supportedResponseFormats = [
            'application/json',
            'application/xml', // machine-readable XML
            'text/xml', // human-readable XML
        ];

        /**
         * --------------------------------------------------------------------------
         * Formatadores
         * --------------------------------------------------------------------------
         *
         * Lista as classes a serem usadas para formatar respostas
         * de um tipo específico. Para cada tipo MIME, lista a
         * classe que deve ser usada. Os formatadores podem ser
         * obtidos através do método `getFormatter()`.
         *
         * @var array<string, string>
         */
        public array $formatters = [
            'application/json' => JSONFormatter::class,
            'application/xml'  => XMLFormatter::class,
            'text/xml'         => XMLFormatter::class,
        ];

        /**
         * --------------------------------------------------------------------------
         * Opções de Formatadores
         * --------------------------------------------------------------------------
         *
         * Opções adicionais para ajustar o comportamento dos
         * formatadores padrão. Para cada tipo MIME, liste as
         * opções adicionais que devem ser usadas.
         *
         * @var array<string, int>
         */
        public array $formatterOptions = [
            'application/json' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
            'application/xml'  => 0,
            'text/xml'         => 0,
        ];
    }
