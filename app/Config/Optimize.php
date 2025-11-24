<?php

    namespace Config;


    /**
     * Configuração de otimização.
     *
     * OBSERVAÇÃO: Esta classe não estende BaseConfig por
     *             motivos de desempenho. Portanto, você não
     *             pode substituir os valores das propriedades
     *             por variáveis de ambiente.
     */
    class Optimize
    {
        /**
         * --------------------------------------------------------------------------
         * Config Caching
         * --------------------------------------------------------------------------
         *
         * @see https://codeigniter.com/user_guide/concepts/factories.html#config-caching
         */
        public bool $configCacheEnabled = false;

        /**
         * --------------------------------------------------------------------------
         * Config Caching
         * --------------------------------------------------------------------------
         *
         * @see https://codeigniter.com/user_guide/concepts/autoloader.html#file-locator-caching
         */
        public bool $locatorCacheEnabled = false;
    }
