<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'category_id', 'sku', 'name', 'slug', 'brand', 'short_description', 
        'description', 'price', 'price_before', 'stock_qty', 'stock_status', 
        'thumbnail', 'is_active', 'is_featured', 'meta_title', 'meta_description'
    ];

    protected $useTimestamps = true;
}
