<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        
        $data = [
            'title' => 'Dashboard',
            'stats' => [
                'services'    => $db->table('services')->countAll(),
                'portfolios'  => $db->table('portfolios')->countAll(),
                'blog_posts'  => $db->table('blog_posts')->countAll(),
                'inquiries'   => $db->table('inquiries')->countAll(),
                'recent_inquiries' => $db->table('inquiries')->orderBy('created_at', 'DESC')->limit(5)->get()->getResult(),
                'recent_activities' => (new \App\Libraries\ActivityService())->getRecent(5),
            ]
        ];

        return view('admin/dashboard/index', $data);
    }
}
