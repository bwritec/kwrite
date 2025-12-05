<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPhotoModel;
use App\Models\ProductThumbnailModel;
use App\Models\ProductCharacteristicModel;
use App\Models\ProductCategoryModel;
use App\Models\CategoryModel;
use App\Models\FavoriteModel;

class ProductController extends BaseController
{
    public function show($id = null)
    {
        if (!$id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produto não encontrado.');
        }

        $productModel = new ProductModel();
        $thumbModel   = new ProductThumbnailModel();

        /**
         * Busca os 12 produtos mais recentes com miniatura
         */
        $last_products = $productModel
            ->select('products.*, product_thumbnails.name AS thumbnail')
            ->join('product_thumbnails', 'product_thumbnails.product_id = products.id', 'left')
            ->orderBy('products.id', 'DESC')
            ->limit(12)
            ->findAll();

        /**
         * Busca produto e miniatura
         */
        $product = $productModel
            ->select('products.*, product_thumbnails.name AS thumbnail')
            ->join('product_thumbnails', 'product_thumbnails.product_id = products.id', 'left')
            ->where('products.id', $id)
            ->first();

        if (!$product)
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produto não encontrado.');
        }

        /**
         * Busca fotos adicionais
         */
        $photosModel = new ProductPhotoModel();
        $photos = $photosModel
            ->where('product_id', $id)
            ->findAll();

        /**
         * Busca características
         */
        $charModel = new ProductCharacteristicModel();
        $characteristics = $charModel
            ->where('product_id', $id)
            ->findAll();

        /**
         * Busca categoria
         */
        $categoryModel = new CategoryModel();
        $catJoin = new ProductCategoryModel();
        $catId = $catJoin->select('category_id')->where('product_id', $id)->first();
        $category = $catId ? $categoryModel->find($catId['category_id']) : null;

        /**
         *
         */
        $favorites = new FavoriteModel();
        $is_favorited = $favorites->isFavorited(session("user.id"), $product["id"]);

        return view('product/show', [
            'title' => esc($product['name']),
            'product' => $product,
            'photos' => $photos,
            'characteristics' => $characteristics,
            'category' => $category,
            'last_products' => $last_products,
            'is_favorited' => $is_favorited
        ]);
    }
}