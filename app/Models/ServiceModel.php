<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'slug', 'icon_svg', 'icon_class', 'thumbnail', 'banner_image', 
        'short_description', 'full_description', 'process_steps', 'faq_ids', 
        'price_start', 'price_end', 'price_label', 'is_featured', 'is_active', 
        'sort_order', 'views', 'meta_title', 'meta_description'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getActiveServices()
    {
        return $this->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll();
    }
}
