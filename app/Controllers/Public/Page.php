<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\PageModel;

class Page extends BaseController
{
    public function show($slug)
    {
        $pageModel = new PageModel();
        $page = $pageModel->where('slug', $slug)->where('is_active', 1)->first();

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'seo' => [
                'title' => $page->title,
                'description' => $page->meta_description ?? substr(strip_tags($page->content), 0, 160),
            ],
            'page' => $page
        ];

        return view('public/page', $data);
    }
}
