<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PageModel;
use App\Libraries\ActivityService;

class PageController extends BaseController
{
    protected $pageModel;
    protected $activityService;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->activityService = new ActivityService();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Statis',
            'pages' => $this->pageModel->findAll()
        ];
        return view('admin/pages/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Halaman',
            'page' => null
        ];
        return view('admin/pages/form', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        if (empty($data['slug'])) $data['slug'] = url_title($data['title'], '-', true);
        
        $this->pageModel->insert($data);
        $this->activityService->log("Membuat halaman statis: {$data['title']}");
        
        return redirect()->to(base_url('admin/pages'))->with('success', 'Halaman berhasil dibuat.');
    }

    public function edit($id)
    {
        $page = $this->pageModel->find($id);
        $data = [
            'title' => 'Edit Halaman',
            'page' => $page
        ];
        return view('admin/pages/form', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->pageModel->update($id, $data);
        $this->activityService->log("Memperbarui halaman statis ID: {$id}");
        
        return redirect()->to(base_url('admin/pages'))->with('success', 'Halaman berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pageModel->delete($id);
        $this->activityService->log("Menghapus halaman statis ID: {$id}");
        return $this->response->setJSON(['status' => 'success']);
    }
}
