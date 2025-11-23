<?php

    namespace Config;

    use CodeIgniter\Events\Events;
    use CodeIgniter\Exceptions\FrameworkException;
    use CodeIgniter\HotReloader\HotReloader;


    /**
     * --------------------------------------------------------------------
     * Application Events
     * --------------------------------------------------------------------
     * Os eventos permitem que você acompanhe a execução do
     * programa sem modificar ou estender os arquivos principais.
     * Este arquivo fornece um local central para definir seus
     * eventos, embora eles também possam ser adicionados em
     * tempo de execução, se necessário.
     *
     * Você cria código que pode ser executado ao se inscrever
     * em eventos com o método 'on()'. Este método aceita qualquer
     * tipo de função, incluindo Closures, que será executada
     * quando o evento for acionado.
     *
     * Exemplo:
     *      Events::on('create', [$myInstance, 'myMethod']);
     */

    Events::on('pre_system', static function (): void {
        if (ENVIRONMENT !== 'testing')
        {
            if (ini_get('zlib.output_compression'))
            {
                throw FrameworkException::forEnabledZlibOutputCompression();
            }

            while (ob_get_level() > 0)
            {
                ob_end_flush();
            }

            ob_start(static fn ($buffer) => $buffer);
        }

        /**
         * --------------------------------------------------------------------
         * Ouvintes da barra de ferramentas de depuração.
         * --------------------------------------------------------------------
         * Se você excluir, eles não serão mais coletados.
         */
        if (CI_DEBUG && ! is_cli())
        {
            Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
            service('toolbar')->respond();

            /**
             * Rota de recarregamento a quente - para uso do
             * framework no recarregador a quente.
             */
            if (ENVIRONMENT === 'development')
            {
                service('routes')->get('__hot-reload', static function (): void {
                    (new HotReloader())->run();
                });
            }
        }
    });
