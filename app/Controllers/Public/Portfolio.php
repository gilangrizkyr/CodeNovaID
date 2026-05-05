<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\PortfolioModel;
use App\Models\PortfolioImageModel;

class Portfolio extends BaseController
{
    protected $portfolioModel;
    protected $imageModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
        $this->imageModel = new PortfolioImageModel();
    }

    public function index()
    {
        $data = [
            'seo' => [
                'title' => 'Portofolio Project',
                'description' => 'Hasil pengerjaan project teknologi terbaik dari CodeNova Indonesia.'
            ],
            'portfolios' => $this->portfolioModel->getWithService($this->request->getGet('service')),
        ];

        return view('public/portfolios/index', $data);
    }

    public function detail($slug)
    {
        $portfolio = $this->portfolioModel->where('slug', $slug)->first();
        if (!$portfolio) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'seo' => [
                'title' => $portfolio->title,
                'description' => $portfolio->short_description,
                'image' => $portfolio->thumbnail
            ],
            'portfolio' => $portfolio,
            'gallery' => $this->imageModel->getByPortfolio($portfolio->id),
            'related' => $this->portfolioModel->where('id !=', $portfolio->id)->limit(3)->findAll()
        ];

        return view('public/portfolios/detail', $data);
    }
}
