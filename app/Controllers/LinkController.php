<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;
    use App\Models\LinkModel;


    /**
     *
     */
    class LinkController extends BaseController
    {
        /**
         *
         */
        public function index()
        {
            $model = new LinkModel();
            $data['links'] = $model->findAll();

            return view('dashboard/links/index', $data);
        }

        /**
         *
         */
        public function create()
        {
            return view('dashboard/links/create');
        }

        /**
         *
         */
        public function store()
        {
            $model = new LinkModel();

            $model->save([
                'name' => $this->request->getPost('name'),
                'url' => $this->request->getPost('url'),
                'open_in_new_window' => $this->request->getPost('open_in_new_window') ? 1 : 0,
            ]);

            return redirect()->to('/dashboard/links');
        }

        /**
         *
         */
        public function edit($id)
        {
            $model = new LinkModel();
            $data['link'] = $model->find($id);

            return view('dashboard/links/edit', $data);
        }

        /**
         *
         */
        public function update($id)
        {
            $model = new LinkModel();
            $model->update($id, [
                'name' => $this->request->getPost('name'),
                'url' => $this->request->getPost('url'),
                'open_in_new_window' => $this->request->getPost('open_in_new_window') ? 1 : 0,
            ]);

            return redirect()->to('/dashboard/links');
        }

        /**
         *
         */
        public function delete($id)
        {
            $model = new LinkModel();
            $model->delete($id);

            return redirect()->to('/dashboard/links');
        }
    }
