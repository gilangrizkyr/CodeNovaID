<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogCategoryModel;

class BlogCategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new BlogCategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori Blog',
            'categories' => $this->categoryModel->findAll()
        ];
        return view('admin/blog/categories/index', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        if (empty($data['slug'])) $data['slug'] = url_title($data['name'], '-', true);
        
        $this->categoryModel->insert($data);
        return redirect()->back()->with('success', 'Kategori ditambahkan.');
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->categoryModel->update($id, $data);
        return redirect()->back()->with('success', 'Kategori diperbarui.');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}
