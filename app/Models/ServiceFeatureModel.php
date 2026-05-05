<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceFeatureModel extends Model
{
    protected $table            = 'service_features';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['service_id', 'title', 'description', 'icon', 'sort_order'];

    public function getByService(int $serviceId)
    {
        return $this->where('service_id', $serviceId)->orderBy('sort_order', 'ASC')->findAll();
    }
}
