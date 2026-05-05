<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Service extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'seo' => [
                'title' => 'Layanan Kami',
                'description' => 'Solusi teknologi terintegrasi untuk bisnis Anda.'
            ],
            'services' => $this->serviceModel->getActiveServices()
        ];

        return view('public/services/index', $data);
    }

    public function detail($slug)
    {
        $service = $this->serviceModel->where('slug', $slug)->where('is_active', 1)->first();
        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'seo' => [
                'title' => $service->title,
                'description' => $service->short_description,
                'image' => $service->thumbnail
            ],
            'service' => $service,
            'all_services' => $this->serviceModel->getActiveServices() // For sidebar
        ];

        return view('public/services/detail', $data);
    }
}
