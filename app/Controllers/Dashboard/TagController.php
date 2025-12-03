<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TagModel;

class TagController extends BaseController
{
    public function index()
    {
        $model = new TagModel();
        $data['tags'] = $model->orderBy('id', 'DESC')->paginate(10);
        $data['pager'] = $model->pager;
        $data["title"] = "Tags";

        return view('dashboard/tags/index', $data);
    }

    public function create()
    {
        return view('dashboard/tags/create', [
            "title" => "Nova Tag"
        ]);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => [
                'label' => 'Nome da Tag',
                'rules' => 'required|is_unique[tags.name]',
                'errors' => [
                    'required'   => 'O nome da tag é obrigatório.',
                    'is_unique'  => 'Este nome de tag já existe.'
                ]
            ],

            'description' => 'permit_empty'
        ];

        if (!$this->validate($rules))
        {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $model = new TagModel();
        $model->insert([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/dashboard/tags')->with('success', 'Tag criada com sucesso!');
    }

    public function edit($id)
    {
        $model = new TagModel();
        $data['tag'] = $model->find($id);
        $data["title"] = "Editar Tag";

        return view('dashboard/tags/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => [
                'label' => 'Nome da Tag',
                'rules' => "required|is_unique[tags.name,id,{$id}]",
                'errors' => [
                    'required'  => 'O nome da tag é obrigatório.',
                    'is_unique' => 'Este nome de tag já existe.'
                ]
            ],
            'description' => 'permit_empty'
        ];

        if (!$this->validate($rules))
        {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $model = new TagModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/dashboard/tags')->with('success', 'Tag atualizada com sucesso!');
    }

    public function delete($id)
    {
        $model = new TagModel();
        $model->delete($id);

        return redirect()->to('/dashboard/tags')->with('success', 'Tag excluída com sucesso!');
    }
}