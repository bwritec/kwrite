<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Images\Handlers\GDHandler;
    use CodeIgniter\Images\Handlers\ImageMagickHandler;


    /**
     *
     */
    class Images extends BaseConfig
    {
        /**
         * O manipulador padrão é usado caso nenhum outro
         * manipulador seja especificado.
         */
        public string $defaultHandler = 'gd';

        /**
         * O caminho para a biblioteca de imagens.
         * Obrigatório para ImageMagick, GraphicsMagick, ou NetPBM.
         */
        public string $libraryPath = '/usr/local/bin/convert';

        /**
         * As classes de manipuladores disponíveis.
         *
         * @var array<string, string>
         */
        public array $handlers = [
            'gd'      => GDHandler::class,
            'imagick' => ImageMagickHandler::class,
        ];
    }
