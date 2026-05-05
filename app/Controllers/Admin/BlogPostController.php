<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPostModel;
use App\Models\BlogCategoryModel;
use App\Libraries\ImageProcessor;

class BlogPostController extends BaseController
{
    protected $postModel;
    protected $categoryModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->postModel = new BlogPostModel();
        $this->categoryModel = new BlogCategoryModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel Blog',
            'posts' => $this->postModel->getWithCategory()
        ];

        return view('admin/blog/posts/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tulis Artikel Baru',
            'post' => null,
            'categories' => $this->categoryModel->findAll()
        ];

        return view('admin/blog/posts/form', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $data['admin_id'] = session()->get('admin_id');
        
        if (empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], '-', true);
        }

        // Handle Thumbnail
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/blog');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        $this->postModel->insert($data);

        return redirect()->to(base_url('admin/blog/posts'))->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function edit($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            return redirect()->to(base_url('admin/blog/posts'))->with('error', 'Artikel tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Artikel',
            'post' => $post,
            'categories' => $this->categoryModel->findAll()
        ];

        return view('admin/blog/posts/form', $data);
    }

    public function update($id)
    {
        $post = $this->postModel->find($id);
        $data = $this->request->getPost();

        // Handle Thumbnail
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            if ($post->thumbnail && file_exists(FCPATH . $post->thumbnail)) {
                @unlink(FCPATH . $post->thumbnail);
            }
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/blog');
        }

        if ($data['status'] === 'published' && empty($post->published_at)) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        $this->postModel->update($id, $data);

        return redirect()->to(base_url('admin/blog/posts'))->with('success', 'Artikel berhasil diperbarui.');
    }

    public function delete($id)
    {
        $post = $this->postModel->find($id);
        if ($post) {
            if ($post->thumbnail && file_exists(FCPATH . $post->thumbnail)) {
                @unlink(FCPATH . $post->thumbnail);
            }
            $this->postModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Artikel berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data.'])->setStatusCode(404);
    }
}
