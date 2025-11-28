<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Validation\StrictRules\CreditCardRules;
    use CodeIgniter\Validation\StrictRules\FileRules;
    use CodeIgniter\Validation\StrictRules\FormatRules;
    use CodeIgniter\Validation\StrictRules\Rules;


    /**
     *
     */
    class Validation extends BaseConfig
    {
        // --------------------------------------------------------------------
        // Setup
        // --------------------------------------------------------------------

        /**
         * Armazena as classes que contêm as regras disponíveis.
         *
         * @var list<string>
         */
        public array $ruleSets = [
            Rules::class,
            FormatRules::class,
            FileRules::class,
            CreditCardRules::class,
        ];

        /**
         * Mensagems de erro customizaveis
         */
        public $customErrors = [
        ];

        /**
         * Especifica as visualizações que são usadas para
         * exibir os erros.
         *
         * @var array<string, string>
         */
        public array $templates = [
            'list'   => 'CodeIgniter\Validation\Views\list',
            'single' => 'CodeIgniter\Validation\Views\single',
        ];

        // --------------------------------------------------------------------
        // Rules
        // --------------------------------------------------------------------
    }
