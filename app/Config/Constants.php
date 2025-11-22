<?php

    /**
     * --------------------------------------------------------------------
     * App Namespace
     * --------------------------------------------------------------------
     *
     * Esta constante define o namespace padrão usado em todo o
     * CodeIgniter para se referir ao diretório da aplicação. Altere
     * esta constante para modificar o namespace que todas as classes
     * da aplicação devem usar.
     *
     * OBSERVAÇÃO: Alterar isso exigirá modificações manuais de
     * namespaces existentes de App\* namespaced-classes.
     */
    defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

    /**
     * --------------------------------------------------------------------------
     * Composer Path
     * --------------------------------------------------------------------------
     *
     * O caminho onde o arquivo de carregamento automático do
     * Composer deve estar localizado. Por padrão, a pasta vendor
     * fica no diretório raiz, mas você pode personalizá-la aqui.
     */
    defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

    /**
     *--------------------------------------------------------------------------
     * Constantes de Tempo
     *--------------------------------------------------------------------------
     *
     * Fornecer maneiras simples de trabalhar com a infinidade
     * de funções PHP que exigem informações em segundos.
     */
    defined('SECOND') || define('SECOND', 1);
    defined('MINUTE') || define('MINUTE', 60);
    defined('HOUR')   || define('HOUR', 3600);
    defined('DAY')    || define('DAY', 86400);
    defined('WEEK')   || define('WEEK', 604800);
    defined('MONTH')  || define('MONTH', 2_592_000);
    defined('YEAR')   || define('YEAR', 31_536_000);
    defined('DECADE') || define('DECADE', 315_360_000);

    /**
     * --------------------------------------------------------------------------
     * Códigos de status de saída
     * --------------------------------------------------------------------------
     *
     * Usado para indicar as condições sob as quais o script está
     * sendo encerrado (exit()). Embora não haja um padrão universal
     * para códigos de erro, existem algumas convenções gerais. Três
     * dessas convenções são mencionadas abaixo, para aqueles que
     * desejam utilizá-las. Os valores padrão do CodeIgniter foram
     * escolhidos por apresentarem a menor sobreposição possível com
     * essas convenções, ao mesmo tempo que permitem a definição de
     * outras em versões futuras e aplicações de usuário.
     *
     * As três principais convenções utilizadas para determinar
     * os códigos de status de saída são as seguintes:
     *
     *    Standard C/C++ Library (stdlibc):
     *       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
     *       (Este link também contém outras convenções específicas do GNU.)
     *    BSD sysexits.h:
     *       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
     *    Bash scripting:
     *       http://tldp.org/LDP/abs/html/exitcodes.html
     *
     */
    defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0);        // sem erros
    defined('EXIT_ERROR')          || define('EXIT_ERROR', 1);          // erro genérico
    defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3);         // erro de configuração
    defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4);   // arquivo não encontrado
    defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5);  // classe desconhecida
    defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // membro da classe desconhecido
    defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7);     // entrada de usuário inválida
    defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8);       // erro de banco de dados
    defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9);      // código de erro mais baixo atribuído automaticamente
    defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125);    // código de erro mais alto atribuído automaticamente
