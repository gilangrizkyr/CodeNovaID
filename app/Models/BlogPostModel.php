<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogPostModel extends Model
{
    protected $table            = 'blog_posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'category_id', 'admin_id', 'title', 'slug', 'excerpt', 
        'content', 'thumbnail', 'status', 'views', 'is_featured', 
        'published_at', 'meta_title', 'meta_description'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWithCategory()
    {
        return $this->select('blog_posts.*, blog_categories.name as category_name, admin_users.name as author_name')
                    ->join('blog_categories', 'blog_categories.id = blog_posts.category_id', 'left')
                    ->join('admin_users', 'admin_users.id = blog_posts.admin_id', 'left')
                    ->orderBy('blog_posts.created_at', 'DESC')
                    ->findAll();
    }

    public function getBySlug($slug)
    {
        return $this->select('blog_posts.*, blog_categories.name as category_name, admin_users.name as author_name')
                    ->join('blog_categories', 'blog_categories.id = blog_posts.category_id', 'left')
                    ->join('admin_users', 'admin_users.id = blog_posts.admin_id', 'left')
                    ->where('blog_posts.slug', $slug)
                    ->where('blog_posts.status', 'published')
                    ->first();
    }
}
