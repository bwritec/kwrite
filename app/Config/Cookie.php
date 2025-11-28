<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use DateTimeInterface;


    /**
     *
     */
    class Cookie extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Cookie Prefix
         * --------------------------------------------------------------------------
         *
         * Defina um prefixo para o nome do cookie se precisar
         * evitar conflitos.
         */
        public string $prefix = '';

        /**
         * --------------------------------------------------------------------------
         * Cookie Expires Timestamp
         * --------------------------------------------------------------------------
         *
         * O valor padrão para o timestamp de expiração dos
         * cookies é `0`. Definir esse valor como `0` significa
         * que o cookie não terá o atributo `Expires` e se
         * comportará como um cookie de sessão.
         *
         * @var DateTimeInterface|int|string
         */
        public $expires = 0;

        /**
         * --------------------------------------------------------------------------
         * Cookie Path
         * --------------------------------------------------------------------------
         *
         * Normalmente será uma barra invertida.
         */
        public string $path = '/';

        /**
         * --------------------------------------------------------------------------
         * Cookie Domain
         * --------------------------------------------------------------------------
         *
         * Definir como `.your-domain.com` para cookies em todo o site.
         */
        public string $domain = '';

        /**
         * --------------------------------------------------------------------------
         * Cookie Secure
         * --------------------------------------------------------------------------
         *
         * O cookie só será definido se existir uma conexão HTTPS segura.
         */
        public bool $secure = false;

        /**
         * --------------------------------------------------------------------------
         * Cookie HTTPOnly
         * --------------------------------------------------------------------------
         *
         * O cookie só poderá ser acessado via HTTP(S) (sem JavaScript).
         */
        public bool $httponly = true;

        /**
         * --------------------------------------------------------------------------
         * Cookie SameSite
         * --------------------------------------------------------------------------
         *
         * Configure a definição SameSite do cookie. Os valores
         * permitidos são:
         * - None
         * - Lax
         * - Strict
         * - ''
         *
         * Alternativamente, você pode usar os nomes das constantes:
         * - `Cookie::SAMESITE_NONE`
         * - `Cookie::SAMESITE_LAX`
         * - `Cookie::SAMESITE_STRICT`
         *
         * O valor padrão é `Lax` para compatibilidade com
         * navegadores modernos. Definir `''` (string vazia)
         * significa que o atributo SameSite padrão definido
         * pelos navegadores (`Lax`) será aplicado aos cookies.
         * Se definido como `None`, `$secure` também deverá
         * ser definido.
         *
         * @var ''|'Lax'|'None'|'Strict'
         */
        public string $samesite = 'Lax';

        /**
         * --------------------------------------------------------------------------
         * Cookie Raw
         * --------------------------------------------------------------------------
         *
         * Esta opção permite definir um cookie "bruto", ou seja,
         * seu nome e valor não são codificados em URL usando
         * `rawurlencode()`.
         *
         * Se esta opção estiver definida como `true`, os nomes
         * dos cookies deverão estar em conformidade com a lista
         * de caracteres permitidos da RFC 2616.
         *
         * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#attributes
         * @see https://tools.ietf.org/html/rfc2616#section-2.2
         */
        public bool $raw = false;
    }
