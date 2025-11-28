<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     * Armazena as configurações padrão da ContentSecurityPolicy,
     * caso você opte por utilizá-la. Os valores aqui inseridos
     * serão lidos e definidos como padrão para o site. Se
     * necessário, eles podem ser alterados página por página.
     *
     * Referência sugerida para explicações:
     *
     * @see https://www.html5rocks.com/en/tutorials/security/content-security-policy/
     */
    class ContentSecurityPolicy extends BaseConfig
    {
        /**
         * -------------------------------------------------------------------------
         * Gestão Broadbrush CSP
         * -------------------------------------------------------------------------
         */

        /**
         * Contexto padrão do relatório CSP
         */
        public bool $reportOnly = false;

        /**
         * Especifica um URL para onde o navegador enviará relatórios
         * quando uma política de segurança de conteúdo for violada.
         */
        public ?string $reportURI = null;

        /**
         * Instrui os agentes de usuário a reescreverem os
         * esquemas de URL, alterando HTTP para HTTPS. Esta
         * diretiva destina-se a sites com um grande número
         * de URLs antigas que precisam ser reescritas.
         */
        public bool $upgradeInsecureRequests = false;

        /**
         * -------------------------------------------------------------------------
         * Fontes permitidas
         *
         * OBSERVAÇÃO: Depois de definir uma política como 'none',
         *             ela não poderá ser restringida posteriormente.
         * -------------------------------------------------------------------------
         */

        /**
         * Se não for alterado, usará o padrão "self".
         *
         * @var list<string>|string|null
         */
        public $defaultSrc;

        /**
         * Lista os URLs dos scripts permitidos.
         *
         * @var list<string>|string
         */
        public $scriptSrc = 'self';

        /**
         * Listas de URLs de folhas de estilo permitidas.
         *
         * @var list<string>|string
         */
        public $styleSrc = 'self';

        /**
         * Define as origens a partir das quais as imagens
         * podem ser carregadas.
         *
         * @var list<string>|string
         */
        public $imageSrc = 'self';

        /**
         * Restringe os URLs que podem aparecer no elemento `<base>`
         * de uma página.
         *
         * Se não for alterado, usará o padrão "self".
         *
         * @var list<string>|string|null
         */
        public $baseURI;

        /**
         * Lista os URLs dos trabalhadores e do conteúdo dos
         * frames incorporados.
         *
         * @var list<string>|string
         */
        public $childSrc = 'self';

        /**
         * Limita as origens às quais você pode se conectar (via
         * XHR, WebSockets e EventSource).
         *
         * @var list<string>|string
         */
        public $connectSrc = 'self';

        /**
         * Especifica as origens que podem fornecer fontes da web.
         *
         * @var list<string>|string
         */
        public $fontSrc;

        /**
         * Lista os endpoints válidos para envio a partir
         * das tags `<form>`.
         *
         * @var list<string>|string
         */
        public $formAction = 'self';

        /**
         * Especifica as fontes que podem incorporar a página
         * atual. Esta diretiva aplica-se às tags `<frame>`,
         * `<iframe>`, `<embed>` e `<applet>`. Esta diretiva
         * não pode ser usada em tags `<meta>` e aplica-se
         * apenas a recursos que não sejam HTML.
         *
         * @var list<string>|string|null
         */
        public $frameAncestors;

        /**
         * A diretiva frame-src restringe os URLs que podem
         * ser carregados em contextos de navegação aninhados.
         *
         * @var list<string>|string|null
         */
        public $frameSrc;

        /**
         * Restringe as origens autorizadas a transmitir
         * vídeo e áudio.
         *
         * @var list<string>|string|null
         */
        public $mediaSrc;

        /**
         * Permite o controle do Flash e de outros plugins.
         *
         * @var list<string>|string
         */
        public $objectSrc = 'self';

        /**
         * @var list<string>|string|null
         */
        public $manifestSrc;

        /**
         * Limita os tipos de plugins que uma página pode invocar.
         *
         * @var list<string>|string|null
         */
        public $pluginTypes;

        /**
         * Lista de ações permitidas.
         *
         * @var list<string>|string|null
         */
        public $sandbox;

        /**
         * Tag Nonce para estilo
         */
        public string $styleNonceTag = '{csp-style-nonce}';

        /**
         * Tag Nonce para script
         */
        public string $scriptNonceTag = '{csp-script-nonce}';

        /**
         * Substituir a tag nonce automaticamente
         */
        public bool $autoNonce = true;
    }
