<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class CURLRequest extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Opções de compartilhamento do CURLRequest
         * --------------------------------------------------------------------------
         *
         * Compartilhar opções entre solicitações ou não.
         *
         * Se isso for true, todas as opções não serão redefinidas
         * entre as solicitações. Isso pode causar uma solicitação
         * de erro com cabeçalhos desnecessários.
         */
        public bool $shareOptions = false;
    }
