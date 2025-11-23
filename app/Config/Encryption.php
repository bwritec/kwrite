<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     * Configuração de criptografia.
     *
     * Estas são as configurações usadas para criptografia,
     * caso você não passe um array de parâmetros para o
     * criptografador durante a criação/inicialização.
     */
    class Encryption extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Chave inicial de criptografia
         * --------------------------------------------------------------------------
         *
         * Se você usar a classe Encryption, deverá definir uma
         * chave de criptografia (semente). Certifique-se de que
         * ela seja longa o suficiente para a cifra e o modo que
         * você pretende usar. Consulte o guia do usuário para
         * obter mais informações.
         */
        public string $key = '';

        /**
         * --------------------------------------------------------------------------
         * Driver de criptografia a ser usado
         * --------------------------------------------------------------------------
         *
         * Um dos drivers de criptografia suportados.
         *
         * Drivers disponíveis:
         * - OpenSSL
         * - Sodium
         */
        public string $driver = 'OpenSSL';

        /**
         * --------------------------------------------------------------------------
         * Comprimento do preenchimento do SodiumHandler em bytes
         * --------------------------------------------------------------------------
         *
         * Este é o número de bytes que serão adicionados ao
         * texto simples antes de ser criptografado. Este valor
         * deve ser maior que zero.
         *
         * Consulte o guia do usuário para obter mais informações
         * sobre o espaçamento interno.
         */
        public int $blockSize = 16;

        /**
         * --------------------------------------------------------------------------
         * Encryption digest
         * --------------------------------------------------------------------------
         *
         * Digest HMAC a ser usado, por exemplo, 'SHA512'
         * ou 'SHA256'. O valor padrão é 'SHA512'.
         */
        public string $digest = 'SHA512';

        /**
         * Indica se o texto cifrado deve ser exibido em
         * formato bruto. Se definido como false, será
         * codificado em base64. Essa configuração é
         * usada apenas pelo OpenSSLHandler.
         *
         * Defina como falso para compatibilidade com
         * a criptografia CI3.
         */
        public bool $rawData = true;

        /**
         * Informações da chave de criptografia.
         * Esta configuração só é utilizada por OpenSSLHandler.
         *
         * Defina como 'encryption' para compatibilidade
         * com criptografia CI3.
         */
        public string $encryptKeyInfo = '';

        /**
         * Informações da chave de autenticação.
         * Esta configuração só é utilizada por OpenSSLHandler.
         *
         * Defina como 'authentication' para compatibilidade
         * com criptografia CI3.
         */
        public string $authKeyInfo = '';

        /**
         * Cifra a ser usada.
         * Esta configuração só é utilizada por OpenSSLHandler.
         *
         * Defina como 'AES-128-CBC' para descriptografar dados
         * criptografados pela configuração padrão de criptografia
         * CI3.
         */
        public string $cipher = 'AES-256-CTR';
    }
