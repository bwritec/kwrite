<?php

    namespace Config;


    /**
     * Paths
     *
     * Contém os caminhos usados pelo sistema para localizar
     * os diretórios principais, como app, system, etc.
     *
     * Modificar essas configurações permite reestruturar
     * seu aplicativo, compartilhar uma pasta do sistema
     * entre vários aplicativos e muito mais.
     *
     * Todos os caminhos são relativos à pasta raiz do projeto.
     */
    class Paths
    {
        /**
         * ---------------------------------------------------------------
         * SYSTEM FOLDER NAME
         * ---------------------------------------------------------------
         *
         * Este arquivo deve conter o nome da sua pasta "system".
         * Inclua o caminho completo se a pasta não estiver no
         * mesmo diretório que este arquivo.
         */
        public string $systemDirectory = __DIR__ . '/../../vendor/codeigniter4/framework/system';

        /**
         * ---------------------------------------------------------------
         * APPLICATION FOLDER NAME
         * ---------------------------------------------------------------
         *
         * Se você deseja que este controlador frontal utilize uma
         * pasta "app" diferente da padrão, você pode definir o nome
         * aqui. A pasta também pode ser renomeada ou realocada para
         * qualquer lugar no seu servidor. Nesse caso, utilize o
         * caminho completo do servidor.
         *
         * @see http://codeigniter.com/user_guide/general/managing_apps.html
         */
        public string $appDirectory = __DIR__ . '/..';

        /**
         * ---------------------------------------------------------------
         * WRITABLE DIRECTORY NAME
         * ---------------------------------------------------------------
         *
         * Essa variável deve conter o nome do seu diretório "gravável".
         * O diretório gravável permite agrupar todos os diretórios que
         * precisam de permissão de escrita em um único local, que pode
         * ser protegido para máxima segurança, mantendo-o fora dos
         * diretórios do aplicativo e/ou do sistema.
         */
        public string $writableDirectory = __DIR__ . '/../../writable';

        /**
         * ---------------------------------------------------------------
         * TESTS DIRECTORY NAME
         * ---------------------------------------------------------------
         *
         * Essa variável deve conter o nome do seu diretório "tests".
         */
        public string $testsDirectory = __DIR__ . '/../../tests';

        /**
         * ---------------------------------------------------------------
         * VIEW DIRECTORY NAME
         * ---------------------------------------------------------------
         *
         * Esta variável deve conter o nome do diretório que
         * contém os arquivos de visualização usados pelo seu
         * aplicativo. Por padrão, ele está em `app/Views`. Este
         * valor é usado quando nenhum valor é fornecido
         * para `Services::renderer()`.
         */
        public string $viewDirectory = __DIR__ . '/../Views';
    }
