<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     * Configuração de Compartilhamento de Recursos de
     * Origem Cruzada (CORS)
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
     */
    class Cors extends BaseConfig
    {
        /**
         * A configuração CORS padrão.
         *
         * @var array{
         *      allowedOrigins: list<string>,
         *      allowedOriginsPatterns: list<string>,
         *      supportsCredentials: bool,
         *      allowedHeaders: list<string>,
         *      exposedHeaders: list<string>,
         *      allowedMethods: list<string>,
         *      maxAge: int,
         *  }
         */
        public array $default = [
            /**
             * Origens do cabeçalho `Access-Control-Allow-Origin`.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
             *
             * Por exemplo.:
             *   - ['http://localhost:8080']
             *   - ['https://www.example.com']
             */
            'allowedOrigins' => [],

            /**
             * Padrões de expressão regular de origem para o
             * cabeçalho `Access-Control-Allow-Origin`.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
             *
             * OBSERVAÇÃO: Um padrão especificado aqui faz parte de uma expressão
             *       regular. Na verdade, será `#\A<pattern>\z#`.
             *
             * Por exemplo.:
             *   - ['https://\w+\.example\.com']
             */
            'allowedOriginsPatterns' => [],

            /**
             * Condições meteorológicas para enviar o cabeçalho
             * `Access-Control-Allow-Credentials`.
             *
             * O cabeçalho de resposta Access-Control-Allow-Credentials
             * informa aos navegadores se o servidor permite que solicitações
             * HTTP de origem cruzada incluam credenciais.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Credentials
             */
            'supportsCredentials' => false,

            /**
             * Defina os cabeçalhos para permitir.
             *
             * O cabeçalho de resposta Access-Control-Allow-Headers é
             * usado em resposta a uma solicitação de pré-voo que inclui
             * o Access-Control-Request-Headers para indicar quais
             * cabeçalhos HTTP podem ser usados durante a solicitação
             * propriamente dita.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Headers
             */
            'allowedHeaders' => [],

            /**
             * Defina os cabeçalhos a serem expostos.
             *
             * O cabeçalho de resposta Access-Control-Expose-Headers
             * permite que um servidor indique quais cabeçalhos de
             * resposta devem ser disponibilizados para scripts em
             * execução no navegador, em resposta a uma solicitação
             * de origem cruzada.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Expose-Headers
             */
            'exposedHeaders' => [],

            /**
             * Defina os métodos permitidos.
             *
             * O cabeçalho de resposta Access-Control-Allow-Methods
             * especifica um ou mais métodos permitidos ao acessar
             * um recurso em resposta a uma solicitação de
             * verificação prévia.
             *
             * Por exemplo.:
             *   - ['GET', 'POST', 'PUT', 'DELETE']
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Methods
             */
            'allowedMethods' => [],

            /**
             * Defina por quantos segundos os resultados de uma
             * solicitação de pré-voo podem ser armazenados em
             * cache.
             *
             * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Max-Age
             */
            'maxAge' => 7200,
        ];
    }
