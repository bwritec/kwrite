<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     * Ativar/desativar recursos que quebrem a compatibilidade
     * com versões anteriores.
     */
    class Feature extends BaseConfig
    {
        /**
         * Use o novo roteamento automático aprimorado em
         * vez da versão antiga.
         */
        public bool $autoRoutesImproved = true;

        /**
         * Use a ordem de execução do filtro na versão 4.4
         * ou anterior.
         */
        public bool $oldFilterOrder = false;

        /**
         * O comportamento de `limit(0)` no Construtor de Consultas.
         *
         * Se true, `limit(0)`  Retorna todos os registros. (Comportamento
         *                      da versão 4.4.x ou anterior na versão 4.x.)
         * Se false, `limit(0)` Não retorna nenhum registro. (Comportamento
         *                      da versão 3.1.9 ou posterior na versão 3.x.)
         */
        public bool $limitZeroAsAll = true;

        /**
         * Utilize negociações de localização rigorosas.
         *
         * Por padrão, a localidade é selecionada com base em uma
         * comparação aproximada do código de idioma (ISO 639-1).
         * Habilitar a comparação rigorosa também considerará o
         * código de região (ISO 3166-1 alpha-2).
         */
        public bool $strictLocaleNegotiation = false;
    }
