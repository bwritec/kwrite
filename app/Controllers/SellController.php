<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductPhotoModel;
use App\Models\ProductThumbnailModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductCharacteristicModel;
use App\Models\ProductCorreioModel;
use CodeIgniter\Files\File;
use Config\Services;
use Config\App;

class SellController extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->orderBy('name', 'ASC')->findAll();

        return view('dashboard/sell', [
            'title' => 'Vender Produto',
            'categories' => $categories,
            'errors' => session()->getFlashdata('errors'),
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function store()
    {
        helper(['form', 'filesystem']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'            => 'required|min_length[3]',
            'conditions'      => 'required',
            'demonstration'   => 'required',
            'description'     => 'required',
            'amount'          => 'required|integer',
            'price'           => 'required|decimal',
            'category_id'     => 'required|integer',
            'characteristics' => 'required',
            'peso'            => 'required',
            'comprimento'     => 'required',
            'altura'          => 'required',
            'largura'         => 'required',

            'miniature' => [
                'rules' => 'uploaded[miniature]|is_image[miniature]|mime_in[miniature,image/jpeg,image/jpg,image/png,image/webp]',
                'errors' => [
                    'uploaded' => 'A imagem de destaque é obrigatória.',
                    'is_image' => 'O arquivo de destaque deve ser uma imagem válida.',
                    'mime_in'  => 'Formatos permitidos: JPG, JPEG, WEBP ou PNG.',
                ]
            ],

            'photos' => [
                'rules' => 'permit_empty',
            ],
        ]);

        if (!$validation->withRequest($this->request)->run())
        {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $photos = $this->request->getFileMultiple('photos');

        /**
         * garante que o array existe e tem pelo menos uma imagem válida
         */
        $validPhotos = [];

        if (!empty($photos))
        {
            foreach ($photos as $photo)
            {
                /**
                 * se por algum motivo vier null/empty, pula
                 */
                if (!$photo)
                {
                    continue;
                }

                /**
                 * Se não for válido, verifica o código de erro
                 */
                if (!$photo->isValid())
                {
                    /**
                     * UPLOAD_ERR_NO_FILE == 4 -> nenhum arquivo enviado (pode pular)
                     * mas se for outro erro, aborta
                     */
                    $errorCode = $photo->getError();
                    if ($errorCode === UPLOAD_ERR_NO_FILE)
                    {
                        /**
                         * pular: nenhum arquivo nessa posição
                         */
                        continue;
                    }

                    /**
                     * erro real no upload
                     */
                    return redirect()->back()
                        ->with('errors', ['photos' => 'Alguma das imagens não pôde ser enviada. Código: ' . $errorCode])
                        ->withInput();
                }

                /**
                 * valida extensão (use lowercase)
                 */
                $ext = strtolower($photo->getClientExtension());
                if (! in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                    return redirect()->back()
                        ->with('errors', ['photos' => 'Apenas JPG, JPEG, WEBP ou PNG são permitidos nas fotos.'])
                        ->withInput();
                }

                /**
                 * se passou todas as validações, adiciona ao array de válidas
                 */
                $validPhotos[] = $photo;
            }
        }

        /**
         * agora verifica se o usuário realmente enviou algo válido
         */
        if (count($validPhotos) === 0)
        {
            return redirect()->back()
                ->with('errors', ['photos' => 'Envie pelo menos uma imagem do produto.'])
                ->withInput();
        }

        $userId = session()->get('user')['id'];
        $env = env('app.rate');
        $taxa = (float) $env ?: 0;

        /**
         * 
         */
        $price = $this->request->getPost('price');
        $price = str_replace(",", ".", $price);

        /**
         * Calcula preço final com taxa
         */
        $price_final = $price + ($price * ($taxa / 100));

        /**
         * Verifica sé produto é de demonstração ou não.
         */
        $demonstration = $this->request->getPost('demonstration');
        if (session('user.admin') !== '1')
        {
            $demonstration = "0";
        }

        $productModel = new ProductModel();
        $productId = $productModel->insert([
            'user_id' => $userId,
            'name' => $this->request->getPost('name'),
            'conditions' => $this->request->getPost('conditions'),
            'demonstration' => $demonstration,
            'description' => $this->request->getPost('description'),
            'amount' => $this->request->getPost('amount'),
            'price' => $price
        ]);

        /**
         * salva miniatura
         */
        $miniature = $this->request->getFile('miniature');
        if ($miniature->isValid())
        {
            $newName = md5(uniqid()) . '.' . $miniature->getClientExtension();
            $miniature->move(FCPATH . 'dist/photos', $newName);

            (new ProductThumbnailModel())->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'name' => 'dist/photos/' . $newName
            ]);
        }

        /**
         * salva fotos extras
         */
        $photos = $this->request->getFiles('photos');
        if ($photos && isset($photos['photos']))
        {
            foreach ($photos['photos'] as $photo)
            {
                if ($photo->isValid())
                {
                    $newName = md5(uniqid()) . '.' . $photo->getClientExtension();
                    $photo->move(FCPATH . 'dist/photos', $newName);

                    (new ProductPhotoModel())->insert([
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'name' => 'dist/photos/' . $newName
                    ]);
                }
            }
        }

        /**
         * salva categoria
         */
        (new ProductCategoryModel())->insert([
            'user_id' => $userId,
            'product_id' => $productId,
            'category_id' => $this->request->getPost('category_id')
        ]);

        /**
         * salva características
         */
        $characteristics = explode("\n", $this->request->getPost('characteristics'));
        foreach ($characteristics as $char)
        {
            $char = trim($char);
            if ($char)
            {
                (new ProductCharacteristicModel())->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'characteristic' => $char
                ]);
            }
        }

        /**
         * salva medidas do produto (para cálculo de frete futuro)
         */
        (new ProductCorreioModel())->insert([
            'user_id' => $userId,
            'product_id' => $productId,
            'weight' => $this->request->getPost('peso'),
            'length' => $this->request->getPost('comprimento'),
            'height' => $this->request->getPost('altura'),
            'width' => $this->request->getPost('largura'),
        ]);

        return redirect()->to('/dashboard/sell')->with('success', 'Produto cadastrado com sucesso!');
    }
}
