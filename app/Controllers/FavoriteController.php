<?php

    namespace App\Controllers;

    use App\Models\FavoriteModel;
    use CodeIgniter\RESTful\ResourceController;


    /**
     *
     */
    class FavoriteController extends BaseController
    {
        /**
         *
         */
        protected $favoriteModel;

        /**
         *
         */
        public function __construct()
        {
            $this->favoriteModel = new FavoriteModel();
        }

        /**
         * Adiciona aos favoritos
         */
        public function add()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            $userId    = $this->request->getPost('user_id');
            $productId = $this->request->getPost('product_id');

            // Evitar duplicado
            $exists = $this->favoriteModel
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($exists) {
                return $this->respond([
                    'message' => 'Produto já está favoritado.'
                ]);
            }

            $this->favoriteModel->insert([
                'user_id'    => $userId,
                'product_id' => $productId
            ]);

            return redirect()->back();
        }

        /**
         * Remove dos favoritos
         */
        public function remove()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            $userId    = $this->request->getPost('user_id');
            $productId = $this->request->getPost('product_id');

            $favorite = $this->favoriteModel
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if (!$favorite)
            {
                return $this->failNotFound('Favorito não encontrado.');
            }

            $this->favoriteModel->delete($favorite['id']);

            return redirect()->back();
        }

        /**
         * Lista favoritos do usuário
         */
        public function list()
        {
            $user = session()->get('user');

            if (!$user)
            {
                return redirect()->to('/login');
            }

            $favorites = $this->favoriteModel
                ->where('user_id', $user["id"])
                ->findAll();

            // return $this->respond($favorites);

            return view('dashboard/favorites', [
                'title' => 'Favoritos',
                
            ]);
        }
    }