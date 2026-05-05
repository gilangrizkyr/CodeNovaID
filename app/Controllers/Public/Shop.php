<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Shop extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'seo' => [
                'title' => 'Produk & Lisensi Teknologi',
                'description' => 'Temukan berbagai produk digital, lisensi software, dan solusi teknologi siap pakai dari CodeNova.',
            ],
            'products' => $this->productModel->where('is_active', 1)->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('public/shop/index', $data);
    }

    public function detail($slug)
    {
        $product = $this->productModel->where('slug', $slug)->where('is_active', 1)->first();
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'seo' => [
                'title' => $product->name,
                'description' => $product->meta_description ?? substr(strip_tags($product->description), 0, 160),
                'image' => base_url($product->thumbnail)
            ],
            'product' => $product
        ];

        return view('public/shop/detail', $data);
    }
}
