<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'portfolio_id', 'client_name', 'client_position', 'client_company', 
        'client_photo', 'content', 'rating', 'source', 'source_url', 
        'is_featured', 'is_active', 'is_verified', 'sort_order'
    ];

    protected $useTimestamps = false;
}
