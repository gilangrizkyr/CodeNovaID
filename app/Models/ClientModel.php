<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table            = 'clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'name', 'slug', 'logo', 'logo_dark', 'website_url', 'industry', 'description', 
        'is_active', 'sort_order'
    ];

    protected $useTimestamps = false;
}
