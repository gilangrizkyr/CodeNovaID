<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Libraries\ImageProcessor;

class ProductController extends BaseController
{
    protected $productModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Produk',
            'products' => $this->productModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/shop/products/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Produk Baru',
            'product' => null
        ];
        return view('admin/shop/products/form', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        if (empty($data['slug'])) $data['slug'] = url_title($data['name'], '-', true);
        
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/products');
        }

        $this->productModel->insert($data);
        return redirect()->to(base_url('admin/shop/products'))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $data = [
            'title' => 'Edit Produk',
            'product' => $product
        ];
        return view('admin/shop/products/form', $data);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);
        $data = $this->request->getPost();
        
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            if ($product->thumbnail && file_exists(FCPATH . $product->thumbnail)) @unlink(FCPATH . $product->thumbnail);
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/products');
        }

        $this->productModel->update($id, $data);
        return redirect()->to(base_url('admin/shop/products'))->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if ($product) {
            if ($product->thumbnail && file_exists(FCPATH . $product->thumbnail)) @unlink(FCPATH . $product->thumbnail);
            $this->productModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Produk dihapus.']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus produk.']);
    }
}
