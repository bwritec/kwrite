<?php

    namespace App\Controllers;

    use App\Models\CategoryModel;
    use CodeIgniter\Controller;


    /**
     *
     */
    class CategoryController extends BaseController
    {
        /**
         *
         */
        protected $categoryModel;

        /**
         *
         */
        protected $helpers = ['form', 'url'];

        /**
         *
         */
        public function __construct()
        {
            $this->categoryModel = new CategoryModel();
        }

        /**
         *
         */
        public function index()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            $categoryModel = new CategoryModel();

            $categories = $categoryModel
                ->select('categories.*, parent_cat.name as parent_name')
                ->join('categories as parent_cat', 'parent_cat.id = categories.parent', 'left')
                ->orderBy('categories.id', 'DESC')
                ->distinct() // evita duplicações se houver join
                ->paginate(10);

            $pager = $categoryModel->pager;

            $admin_theme = env('app.theme.system');

            $data = [
                'title' => 'Categorias',
                'categories' => $categories,
                'pager' => $pager,
                'user' => $user,
                'admin_theme' => $admin_theme,
                'page' => 'dashboard.categories'
            ];

            return view('system/'. $admin_theme .'/dashboard/categories/index', $data);
        }

        /**
         *
         */
        public function create()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            $categoryModel = new CategoryModel();

            /**
             * Busca todas as categorias existentes (para o select de "Categoria Pai")
             */
            $parents = $categoryModel->orderBy('name', 'ASC')->findAll();

            $admin_theme = env('app.theme.system');

            $data = [
                'title' => 'Nova Categoria',
                'parents' => $parents,
                'user' => $user,
                'admin_theme' => $admin_theme,
                'page' => 'dashboard.categories'
            ];

            return view('system/'. $admin_theme .'/dashboard/categories/create', $data);
        }

        /**
         *
         */
        public function store()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            $validation = \Config\Services::validation();

            $rules = [
                'name' => 'required|min_length[3]|max_length[30]',
                'parent' => 'permit_empty|integer',
            ];

            if (!$this->validate($rules))
            {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $this->categoryModel->save([
                'parent'      => $this->request->getPost('parent') ?: 0,
                'name'        => $this->request->getPost('name'),
                'slogan'      => $this->request->getPost('slogan'),
                'description' => $this->request->getPost('description'),
            ]);

            return redirect()
                ->to('/dashboard/categories')
                ->with('success', 'Categoria criada com sucesso!');
        }

        /**
         *
         */
        public function edit($id)
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            $category = $this->categoryModel->find($id);

            $categoryModel = new CategoryModel();

            /**
             * Busca todas as categorias existentes (para o select de "Categoria Pai")
             */
            $parents = $categoryModel->orderBy('name', 'ASC')->findAll();

            if (!$category)
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Categoria não encontrada');
            }

            $admin_theme = env('app.theme.system');

            $data = [
                'title' => 'Editar Categoria',
                'category' => $category,
                'parents' => $parents,
                'user' => $user,
                'admin_theme' => $admin_theme,
                'page' => 'dashboard.categories'
            ];

            return view('system/'. $admin_theme .'/dashboard/categories/edit', $data);
        }

        /**
         *
         */
        public function update($id)
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            $this->categoryModel->update($id, [
                'parent'      => $this->request->getPost('parent') ?: 0,
                'name'        => $this->request->getPost('name'),
                'slogan'      => $this->request->getPost('slogan'),
                'description' => $this->request->getPost('description'),
            ]);

            return redirect()
                ->to('/dashboard/categories')
                ->with('success', 'Categoria atualizada com sucesso!');
        }

        /**
         *
         */
        public function delete($id)
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            if ($user["admin"] !== '1')
            {
                return redirect()->to('/dashboard');
            }

            $this->categoryModel->delete($id);

            return redirect()
                ->to('/dashboard/categories')
                ->with('success', 'Categoria removida com sucesso!');
        }
    }
