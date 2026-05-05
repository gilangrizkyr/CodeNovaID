<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Libraries\ImageProcessor;

class ServiceController extends BaseController
{
    protected $serviceModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Layanan',
            'services' => $this->serviceModel->orderBy('sort_order', 'ASC')->findAll()
        ];

        return view('admin/services/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Layanan Baru',
            'service' => null
        ];

        return view('admin/services/form', $data);
    }

    public function create()
    {
        if (!$this->validate('service')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        
        // Handle Thumbnail
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/services');
        }

        $this->serviceModel->insert($data);

        return redirect()->to(base_url('admin/services'))->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Layanan tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Layanan: ' . $service->title,
            'service' => $service
        ];

        return view('admin/services/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate('service')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $service = $this->serviceModel->find($id);
        $data = $this->request->getPost();
        
        // Handle Thumbnail
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            // Delete old file if exists
            if ($service->thumbnail && file_exists(FCPATH . $service->thumbnail)) {
                @unlink(FCPATH . $service->thumbnail);
            }
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/services');
        }

        $this->serviceModel->update($id, $data);

        return redirect()->to(base_url('admin/services'))->with('success', 'Layanan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $service = $this->serviceModel->find($id);
        if ($service) {
            if ($service->thumbnail && file_exists(FCPATH . $service->thumbnail)) {
                @unlink(FCPATH . $service->thumbnail);
            }
            $this->serviceModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Layanan berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus layanan.'])->setStatusCode(404);
    }
}
