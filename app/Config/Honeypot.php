<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Honeypot extends BaseConfig
    {
        /**
         * Torna o Honeypot visível ou não para humanos.
         */
        public bool $hidden = true;

        /**
         * Conteúdo do rótulo Honeypot
         */
        public string $label = 'Fill This Field';

        /**
         * Nome do campo Honeypot
         */
        public string $name = 'honeypot';

        /**
         * Modelo HTML do Honeypot
         */
        public string $template = '<label>{label}</label><input type="text" name="{name}" value="">';

        /**
         * Honeypot container
         *
         * Se você habilitou o CSP, pode removê-lo `style="display:none"`.
         */
        public string $container = '<div style="display:none">{template}</div>';

        /**
         * O atributo id para a tag do contêiner Honeypot
         *
         * Utilizado quando o CSP está ativado.
         */
        public string $containerId = 'hpc';
    }
