<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\BlogPostModel;
use App\Models\BlogCategoryModel;

class Blog extends BaseController
{
    protected $postModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->postModel = new BlogPostModel();
        $this->categoryModel = new BlogCategoryModel();
    }

    public function index()
    {
        $data = [
            'seo' => [
                'title' => 'Blog & Insight Teknologi',
                'description' => 'Update terbaru seputar teknologi, bisnis, dan tips dari tim ahli CodeNova.'
            ],
            'posts' => $this->postModel->where('status', 'published')->getWithCategory(),
            'categories' => $this->categoryModel->findAll()
        ];

        return view('public/blog/index', $data);
    }

    public function detail($slug)
    {
        $post = $this->postModel->getBySlug($slug);
        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Increment view count
        $this->postModel->update($post->id, ['views' => $post->views + 1]);

        $data = [
            'seo' => [
                'title' => $post->title,
                'description' => $post->excerpt,
                'image' => $post->thumbnail
            ],
            'post' => $post,
            'related' => $this->postModel->where('id !=', $post->id)->where('status', 'published')->limit(3)->findAll(),
            'categories' => $this->categoryModel->findAll()
        ];

        return view('public/blog/detail', $data);
    }
}
