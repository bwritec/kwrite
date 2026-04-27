<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;
    use CodeIgniter\HTTP\CLIRequest;
    use CodeIgniter\HTTP\IncomingRequest;
    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use Psr\Log\LoggerInterface;

    use App\Models\CategoryModel;
    use App\Models\LinkModel;


    /**
     * Class BaseController
     *
     * BaseController Oferece um local conveniente para carregar
     * componentes e executar funções necessárias para todos os
     * seus controllers.
     *
     * Estenda esta classe em qualquer novo controllers:
     *     class Home extends BaseController
     *
     * Por questões de segurança, certifique-se de declarar
     * quaisquer novos métodos como protegidos ou privados.
     */
    abstract class BaseController extends Controller
    {
        /**
         * A lista de categorias do site.
         */
        protected $global_categories;

        /**
         * A lista de links do site.
         */
        protected $global_links;

        /**
         * Instância do objeto Request principal.
         *
         * @var CLIRequest|IncomingRequest
         */
        protected $request;

        /**
         * Um conjunto de funções auxiliares a serem carregadas
         * automaticamente na instanciação da classe. Essas
         * funções auxiliares estarão disponíveis para todos os
         * outros controllers que estendem BaseController.
         *
         * @var list<string>
         */
        protected $helpers = [];

        /**
         * Certifique-se de declarar as propriedades para
         * qualquer busca de propriedade que você tenha
         * inicializado.
         * 
         * A criação de propriedades dinâmicas foi descontinuada
         * no PHP 8.2.
         */
        // protected $session;

        /**
         * @return void
         */
        public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
        {
            /**
             * Não edite esta linha
             */
            parent::initController($request, $response, $logger);

            /**
             * Chama o helper
             */
            helper('category');

            /**
             * Pré-carregue aqui quaisquer modelos, bibliotecas, etc.
             */

            /**
             * Exemplo: $this->session = service('session');
             */

            /**
             * Adicionar links ao menu do site.
             */
            $linkModel = new LinkModel();
            $this->global_links = $linkModel->orderBy('id', 'ASC')->findAll();

            /**
             * Adicionar categorias ao menu dropdown
             * do site.
             */
            $categories = new CategoryModel();
            $allCategories = $categories->orderBy('name', 'ASC')->findAll();

            /**
             * monta árvore de categorias (pai > filhos)
             */
            $this->global_categories = build_category_tree($allCategories);

            /**
             * --- disponibiliza 'categories' para todas as views ---
             * use o service 'renderer' em vez de view() sem parâmetros
             */
            $renderer = \Config\Services::renderer();

            /**
             * setData mantém/mescla dados compartilhados para as views
             * (setData espera um array associativo)
             */
            $renderer->setData([
                'global_categories' => $this->global_categories,
                'global_links' => $this->global_links
            ]);
        }
    }
