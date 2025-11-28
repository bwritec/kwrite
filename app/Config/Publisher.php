<?php

    namespace Config;

    use CodeIgniter\Config\Publisher as BasePublisher;


    /**
     * Configuração do Publisher
     *
     * Define restrições básicas de segurança para a classe
     * Publisher a fim de evitar abusos por meio da injeção
     * de arquivos maliciosos em um projeto.
     */
    class Publisher extends BasePublisher
    {
        /**
         * Uma lista de destinos permitidos com uma expressão
         * regular (pseudo) dos arquivos permitidos para cada
         * destino. Tentativas de publicação em diretórios que
         * não estejam nesta lista resultarão em uma exceção
         * PublisherException. Arquivos que não corresponderem
         * ao padrão farão com que a cópia/fusão falhe.
         *
         * @var array<string, string>
         */
        public $restrictions = [
            ROOTPATH => '*',
            FCPATH   => '#\.(s?css|js|map|html?|xml|json|webmanifest|ttf|eot|woff2?|gif|jpe?g|tiff?|png|webp|bmp|ico|svg)$#i',
        ];
    }
