<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'title', 'slug', 'content', 'meta_title', 'meta_description', 'is_active'
    ];

    protected $useTimestamps = true;
}
