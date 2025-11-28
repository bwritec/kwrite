<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class App extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Base Site URL
         * --------------------------------------------------------------------------
         *
         * URL da raiz do seu CodeIgniter. Normalmente, será a sua URL base,
         * COM uma barra no final:
         *
         * Por exemplo, http://example.com/
         */
        public string $baseURL = 'http://localhost:8080/';

        /**
         * Nomes de host permitidos no URL do site, além do
         * nome de host no URL base. Se você deseja aceitar vários
         * nomes de host, defina esta opção.
         *
         * Por exemplo,
         * Quando o URL do seu site ($baseURL) é 'http://example.com/', e seu site
         * também aceita 'http://media.example.com/' e 'http://accounts.example.com/':
         *     [
         *         'media.example.com',
         *         'accounts.example.com'
         *     ]
         *
         * @var list<string>
         */
        public array $allowedHostnames = [];

        /**
         * --------------------------------------------------------------------------
         * Index File
         * --------------------------------------------------------------------------
         *
         * Normalmente, este será o seu arquivo `index.php`, a menos que
         * você o tenha renomeado. Se você configurou seu servidor web
         * para remover este arquivo dos URIs do seu site, defina esta
         * variável como uma string vazia.
         */
        public string $indexPage = 'index.php';

        /**
         * --------------------------------------------------------------------------
         * URI PROTOCOL
         * --------------------------------------------------------------------------
         *
         * Este item determina qual variável global do servidor deve ser
         * usada para recuperar a string URI. A configuração padrão 'REQUEST_URI'
         * funciona para a maioria dos servidores. Se seus links não estiverem
         * funcionando, tente uma das outras opções disponíveis:
         *
         *  'REQUEST_URI': Uses $_SERVER['REQUEST_URI']
         * 'QUERY_STRING': Uses $_SERVER['QUERY_STRING']
         *    'PATH_INFO': Uses $_SERVER['PATH_INFO']
         *
         * AVISO: Se você definir isso como 'PATH_INFO', os URIs serão
         * sempre decodificados em URL!
         */
        public string $uriProtocol = 'REQUEST_URI';

        /**
         *--------------------------------------------------------------------------
         * Caracteres permitidos na URL
         *--------------------------------------------------------------------------
         *
         * Isso permite especificar quais caracteres são permitidos em
         * seus URLs. Quando alguém tentar enviar um URL com caracteres
         * não permitidos, receberá uma mensagem de aviso.
         *
         * Como medida de segurança, é ALTAMENTE recomendável que você
         * limite os URLs ao menor número possível de caracteres.
         *
         * Por padrão, somente estas opções são permitidas: `a-z 0-9~%.:_-`
         *
         * Defina uma string vazia para permitir todos os caracteres -- mas
         * somente se você for louco.
         *
         * O valor configurado é, na verdade, um grupo de caracteres de
         * expressão regular. e será usado como: '/\A[<permittedURIChars>]+\z/iu'
         *
         * NÃO ALTERE ISTO A MENOS QUE COMPREENDA COMPLETAMENTE
         * AS REPERCUSSÕES!!
         *
         */
        public string $permittedURIChars = 'a-z 0-9~%.:_\-';

        /**
         * --------------------------------------------------------------------------
         * Localidade padrão
         * --------------------------------------------------------------------------
         *
         * A localidade representa, de forma geral, o idioma e a localização
         * de onde o visitante está visualizando o site. Ela afeta as sequências
         * de caracteres de idioma e outras sequências (como marcadores de moeda,
         * números etc.) que seu programa deve usar para essa solicitação.
         */
        public string $defaultLocale = 'pt-BR';

        /**
         * --------------------------------------------------------------------------
         * Negociar Local
         * --------------------------------------------------------------------------
         *
         * Se true, o objeto Request atual determinará automaticamente
         * o idioma a ser usado com base no valor do cabeçalho Accept-Language.
         *
         * Se false, Nenhuma detecção automática será realizada.
         */
        public bool $negotiateLocale = false;

        /**
         * --------------------------------------------------------------------------
         * Locais suportados
         * --------------------------------------------------------------------------
         *
         * Se `$negotiateLocale` for true, este array lista os idiomas
         * suportados pelo aplicativo em ordem decrescente de prioridade.
         * Se nenhuma correspondência for encontrada, o primeiro idioma
         * disponível será usado.
         *
         * IncomingRequest::setLocale() também usa esta lista.
         *
         * @var list<string>
         */
        public array $supportedLocales = ['en'];

        /**
         * --------------------------------------------------------------------------
         * Fuso horário do aplicativo
         * --------------------------------------------------------------------------
         *
         * O fuso horário padrão que será usado em seu aplicativo
         * para exibir datas com o auxiliar de data, e pode ser
         * obtido através de app_timezone().
         *
         * @see https://www.php.net/manual/en/timezones.php para lista de
         *      fusos horários suportado pelo PHP.
         */
        public string $appTimezone = 'UTC';

        /**
         * --------------------------------------------------------------------------
         * Conjunto de caracteres padrão
         * --------------------------------------------------------------------------
         *
         * Isso determina qual conjunto de caracteres é usado por padrão
         * em vários métodos que exigem que um conjunto de caracteres
         * seja fornecido.
         *
         * @see http://php.net/htmlspecialchars Para obter uma lista dos
         *      conjuntos de caracteres suportados.
         */
        public string $charset = 'UTF-8';

        /**
         * --------------------------------------------------------------------------
         * Forçar solicitações seguras globais
         * --------------------------------------------------------------------------
         *
         * Se true, essa configuração forçará todas as solicitações feitas
         * a este aplicativo a serem realizadas por meio de uma conexão
         * segura (HTTPS). Caso a solicitação recebida não seja segura,
         * o usuário será redirecionado para uma versão segura da página
         * e o cabeçalho HTTP Strict Transport Security (HSTS) será
         * definido.
         */
        public bool $forceGlobalSecureRequests = false;

        /**
         * --------------------------------------------------------------------------
         * IPs de proxy reverso
         * --------------------------------------------------------------------------
         *
         * Se o seu servidor estiver atrás de um proxy reverso, você
         * deve adicionar à lista de permissões os endereços IP do proxy
         * dos quais o CodeIgniter deve confiar nos cabeçalhos, como
         * X-Forwarded-For ou Client-IP, para identificar corretamente
         * o endereço IP do visitante.
         *
         * Você precisa configurar um endereço IP de proxy ou um
         * endereço IP com sub-redes e o cabeçalho HTTP para o
         * endereço IP do cliente.
         *
         * Aqui estão alguns exemplos:
         *     [
         *         '10.0.1.200'     => 'X-Forwarded-For',
         *         '192.168.5.0/24' => 'X-Real-IP',
         *     ]
         *
         * @var array<string, string>
         */
        public array $proxyIPs = [];

        /**
         * --------------------------------------------------------------------------
         * Content Security Policy
         * --------------------------------------------------------------------------
         *
         * Habilita a Política de Segurança de Conteúdo da Resposta para
         * restringir as fontes que podem ser usadas para imagens, scripts,
         * arquivos CSS, áudio, vídeo etc. Se habilitada, o objeto de Resposta
         * preencherá os valores padrão da política a partir do arquivo
         * `ContentSecurityPolicy.php`. Os controladores sempre podem adicionar
         * restrições a esses dados em tempo de execução.
         *
         * Para uma melhor compreensão do CSP, consulte estes documentos:
         *
         * @see http://www.html5rocks.com/en/tutorials/security/content-security-policy/
         * @see http://www.w3.org/TR/CSP/
         */
        public bool $CSPEnabled = false;
    }
