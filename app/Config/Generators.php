<?php

    namespace Config;

    use CodeIgniter\Config\BaseConfig;


    /**
     *
     */
    class Generators extends BaseConfig
    {
        /**
         * --------------------------------------------------------------------------
         * Visualizações dos comandos do gerador
         * --------------------------------------------------------------------------
         *
         * Este array define o mapeamento dos comandos do gerador
         * para os arquivos de visualização que eles utilizam. Se
         * precisar personalizá-los, copie esses arquivos de
         * visualização para sua própria pasta e indique o
         * local aqui.
         *
         * Você notará que as visualizações possuem marcadores
         * especiais entre chaves `{...}`. Esses marcadores são
         * usados internamente pelos comandos do gerador no
         * processamento de substituições; portanto, esteja
         * ciente de que você não deve excluí-los nem modificar
         * seus nomes. Caso contrário, poderá interromper o
         * processo de geração de código e gerar erros.
         *
         * VOCÊ FOI AVISADO !
         *
         * @var array<string, array<string, string>|string>
         */
        public array $views = [
            'make:cell' => [
                'class' => 'CodeIgniter\Commands\Generators\Views\cell.tpl.php',
                'view'  => 'CodeIgniter\Commands\Generators\Views\cell_view.tpl.php',
            ],

            'make:command'      => 'CodeIgniter\Commands\Generators\Views\command.tpl.php',
            'make:config'       => 'CodeIgniter\Commands\Generators\Views\config.tpl.php',
            'make:controller'   => 'CodeIgniter\Commands\Generators\Views\controller.tpl.php',
            'make:entity'       => 'CodeIgniter\Commands\Generators\Views\entity.tpl.php',
            'make:filter'       => 'CodeIgniter\Commands\Generators\Views\filter.tpl.php',
            'make:migration'    => 'CodeIgniter\Commands\Generators\Views\migration.tpl.php',
            'make:model'        => 'CodeIgniter\Commands\Generators\Views\model.tpl.php',
            'make:seeder'       => 'CodeIgniter\Commands\Generators\Views\seeder.tpl.php',
            'make:validation'   => 'CodeIgniter\Commands\Generators\Views\validation.tpl.php',
            'session:migration' => 'CodeIgniter\Commands\Generators\Views\migration.tpl.php',
        ];
    }
