<?php

    namespace Config;

    use CodeIgniter\Config\View as BaseView;
    use CodeIgniter\View\ViewDecoratorInterface;


    /**
     * @phpstan-type parser_callable (callable(mixed): mixed)
     * @phpstan-type parser_callable_string (callable(mixed): mixed)&string
     */
    class View extends BaseView
    {
        /**
         * Quando definido como false, o método de visualização
         * limpará os dados entre cada chamada. Isso mantém seus
         * dados seguros e garante que não haja vazamento acidental
         * entre as chamadas, portanto, você precisaria passar os
         * dados explicitamente para cada visualização. Você pode
         * preferir que os dados sejam mantidos entre as chamadas
         * para que estejam disponíveis para todas as visualizações.
         * Nesse caso, defina `$saveData` como true.
         *
         * @var bool
         */
        public $saveData = true;

        /**
         * Os filtros do analisador sintático mapeiam um nome
         * de filtro para qualquer função PHP chamável. Quando
         * o analisador sintático prepara uma variável para
         * exibição, ele a encadeia através dos filtros na ordem
         * definida, inserindo quaisquer parâmetros. Para evitar
         * possíveis abusos, todos os filtros DEVEM ser definidos
         * aqui para que estejam disponíveis para uso dentro do
         * analisador sintático.
         *
         * Examples:
         *  { title|esc(js) }
         *  { created_on|date(Y-m-d)|esc(attr) }
         *
         * @var         array<string, string>
         * @phpstan-var array<string, parser_callable_string>
         */
        public $filters = [];

        /**
         * Os plugins do analisador sintático permitem estender
         * a funcionalidade fornecida pelo analisador sintático
         * principal, criando aliases que serão substituídos por
         * qualquer função chamável. Podem ser aliases únicos ou
         * pares de tags.
         *
         * @var         array<string, callable|list<string>|string>
         * @phpstan-var array<string, list<parser_callable_string>|parser_callable_string|parser_callable>
         */
        public $plugins = [];

        /**
         * Os View Decorators são métodos de classe que serão
         * executados em sequência para ter a chance de alterar
         * a saída gerada imediatamente antes do armazenamento
         * em cache dos resultados.
         *
         * Todas as classes devem implementar CodeIgniter\View\ViewDecoratorInterface
         *
         * @var list<class-string<ViewDecoratorInterface>>
         */
        public array $decorators = [];
    }
