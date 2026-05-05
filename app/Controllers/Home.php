<?php

namespace App\Controllers;

use Config\Database;

class Home extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        
        $data = [
            'seo' => [
                'title' => 'Home',
            ],
            'services' => $db->table('services')
                            ->where('is_featured', 1)
                            ->orderBy('sort_order', 'ASC')
                            ->get()->getResult(),
            'portfolios' => $db->table('portfolios')
                            ->where('is_featured', 1)
                            ->orderBy('created_at', 'DESC')
                            ->limit(6)
                            ->get()->getResult(),
            'testimonials' => $db->table('testimonials')
                            ->where('is_active', 1)
                            ->orderBy('sort_order', 'ASC')
                            ->get()->getResult(),
            'faqs' => $db->table('faqs')
                            ->where('is_active', 1)
                            ->orderBy('sort_order', 'ASC')
                            ->limit(5)
                            ->get()->getResult(),
            'clients' => $db->table('clients')
                            ->where('is_active', 1)
                            ->orderBy('sort_order', 'ASC')
                            ->get()->getResult(),
            'team' => $db->table('team_members')
                            ->where('is_active', 1)
                            ->orderBy('sort_order', 'ASC')
                            ->get()->getResult(),
        ];

        return view('public/home', $data);
    }

    public function maintenance()
    {
        return view('public/maintenance');
    }
}
