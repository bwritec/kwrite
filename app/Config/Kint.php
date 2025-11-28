<?php

    namespace Config;

    use Kint\Parser\ConstructablePluginInterface;
    use Kint\Renderer\Rich\TabPluginInterface;
    use Kint\Renderer\Rich\ValuePluginInterface;


    /**
     * --------------------------------------------------------------------------
     * Kint
     * --------------------------------------------------------------------------
     *
     * Usamos o `RichRenderer` e o `CLIRenderer` do Kint. Esta
     * área contém opções que você pode configurar para personalizar
     * o funcionamento do Kint.
     *
     * @see https://kint-php.github.io/kint/ Para obter detalhes sobre essas configurações.
     */
    class Kint
    {
        /*
        |--------------------------------------------------------------------------
        | Global Settings
        |--------------------------------------------------------------------------
        */

        /**
         * @var list<class-string<ConstructablePluginInterface>|ConstructablePluginInterface>|null
         */
        public $plugins;

        /**
         *
         */
        public int $maxDepth = 6;

        /**
         *
         */
        public bool $displayCalledFrom = true;

        /**
         *
         */
        public bool $expanded = false;

        /**
         * --------------------------------------------------------------------------
         * RichRenderer Settings
         * --------------------------------------------------------------------------
         */
        public string $richTheme = 'aante-light.css';
        public bool $richFolder  = false;

        /**
         * @var array<string, class-string<ValuePluginInterface>>|null
         */
        public $richObjectPlugins;

        /**
         * @var array<string, class-string<TabPluginInterface>>|null
         */
        public $richTabPlugins;

        /**
         * --------------------------------------------------------------------------
         * CLI Settings
         * --------------------------------------------------------------------------
         */
        public bool $cliColors      = true;
        public bool $cliForceUTF8   = false;
        public bool $cliDetectWidth = true;
        public int $cliMinWidth     = 40;
    }
