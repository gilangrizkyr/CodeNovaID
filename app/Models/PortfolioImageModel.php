<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioImageModel extends Model
{
    protected $table            = 'portfolio_images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['portfolio_id', 'image_path', 'thumb_path', 'is_primary', 'sort_order'];

    public function getByPortfolio(int $portfolioId)
    {
        return $this->where('portfolio_id', $portfolioId)->orderBy('sort_order', 'ASC')->findAll();
    }
}
