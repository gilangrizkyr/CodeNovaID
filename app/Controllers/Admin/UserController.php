<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class UserController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminUserModel();
    }

    public function index()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to(base_url('admin/dashboard'))->with('error', 'Akses ditolak.');
        }

        $data = [
            'title' => 'Manajemen Admin',
            'users' => $this->adminModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/settings/users/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Admin Baru',
            'user' => null
        ];
        return view('admin/settings/users/form', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        
        $this->adminModel->insert($data);
        return redirect()->to(base_url('admin/settings/users'))->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = $this->adminModel->find($id);
        $data = [
            'title' => 'Edit Admin',
            'user' => $user
        ];
        return view('admin/settings/users/form', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        $this->adminModel->update($id, $data);
        return redirect()->to(base_url('admin/settings/users'))->with('success', 'Admin berhasil diperbarui.');
    }

    public function delete($id)
    {
        if ($id == session()->get('admin_id')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda tidak bisa menghapus diri sendiri.']);
        }
        
        $this->adminModel->delete($id);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Admin berhasil dihapus.']);
    }
}
