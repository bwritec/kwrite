<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Migrations extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Enable/Disable Migrations
         * --------------------------------------------------------------------------
         *
         * Migrations estão ativadas por padrão.
         *
         * Você deve habilitar as migrações sempre que pretender
         * realizar uma migração de esquema e desabilitá-las
         * novamente quando terminar.
         */
        public bool $enabled = true;

        /**
         * --------------------------------------------------------------------------
         * Migrations Table
         * --------------------------------------------------------------------------
         *
         * Este é o nome da tabela que armazenará o estado atual
         * das migrações. Quando as migrações forem executadas,
         * elas registrarão em uma tabela do banco de dados quais
         * arquivos de migração já foram executados.
         */
        public string $table = 'migrations';

        /**
         * --------------------------------------------------------------------------
         * Timestamp Format
         * --------------------------------------------------------------------------
         *
         * Este é o formato que será usado ao criar novas
         * migrações usando o comando da CLI:
         *   > php spark make:migration
         *
         * OBSERVAÇÃO: Se você definir um formato não compatível,
         *             o executor de migração não encontrará seus
         *             arquivos de migração.
         *
         * Formatos suportados:
         * - YmdHis_
         * - Y-m-d-His_
         * - Y_m_d_His_
         */
        public string $timestampFormat = 'Y-m-d-His_';
    }
