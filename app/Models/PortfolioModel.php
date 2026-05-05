<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table            = 'portfolios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'service_id', 'title', 'slug', 'client_name', 'client_company', 
        'client_logo', 'project_year', 'project_url', 'play_store_url', 
        'app_store_url', 'thumbnail', 'cover_image', 'short_description', 
        'description', 'challenge', 'solution', 'result', 'technologies', 
        'duration', 'is_featured', 'is_active', 'is_confidential', 
        'sort_order', 'views', 'meta_title', 'meta_description'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWithService($serviceSlug = null)
    {
        $builder = $this->select('portfolios.*, services.title as service_title')
                    ->join('services', 'services.id = portfolios.service_id', 'left');
        
        if ($serviceSlug) {
            $builder->where('services.slug', $serviceSlug);
        }

        return $builder->orderBy('portfolios.created_at', 'DESC')->findAll();
    }
}
