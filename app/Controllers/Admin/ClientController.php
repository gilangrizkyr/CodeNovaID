<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Libraries\ImageProcessor;

class ClientController extends BaseController
{
    protected $clientModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title'   => 'Manajemen Klien & Partner',
            'clients' => $this->clientModel->orderBy('sort_order', 'ASC')->findAll()
        ];

        return view('admin/clients/index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Tambah Klien',
            'client' => null
        ];

        return view('admin/clients/form', $data);
    }

    public function edit($id)
    {
        $client = $this->clientModel->find($id);
        if (!$client) {
            return redirect()->to('admin/clients')->with('error', 'Klien tidak ditemukan.');
        }

        $data = [
            'title'  => 'Edit Klien',
            'client' => $client
        ];

        return view('admin/clients/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        
        $rules = [
            'name' => 'required|min_length[2]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Pastikan semua input valid.');
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'website_url' => $this->request->getPost('website'),
            'sort_order'  => $this->request->getPost('sort_order') ?? 0,
            'is_active'   => $this->request->getPost('is_active') ? 1 : 0,
        ];

        // Handle Logo Upload
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $data['logo'] = $this->imageProcessor->upload($logo, 'clients', 400, 400);
        }

        if ($id) {
            $this->clientModel->update($id, $data);
            $msg = 'Klien berhasil diperbarui.';
        } else {
            $this->clientModel->insert($data);
            $msg = 'Klien berhasil ditambahkan.';
        }

        return redirect()->to('admin/clients')->with('success', $msg);
    }

    public function delete($id)
    {
        if ($this->clientModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Klien berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus klien.']);
    }
}
