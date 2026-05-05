<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class FaqController extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen FAQ',
            'faqs'  => $this->faqModel->orderBy('sort_order', 'ASC')->findAll()
        ];

        return view('admin/faqs/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah FAQ',
            'faq'   => null
        ];

        return view('admin/faqs/form', $data);
    }

    public function edit($id)
    {
        $faq = $this->faqModel->find($id);
        if (!$faq) {
            return redirect()->to('admin/faqs')->with('error', 'FAQ tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit FAQ',
            'faq'   => $faq
        ];

        return view('admin/faqs/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        
        $rules = [
            'question' => 'required|min_length[5]',
            'answer'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Pastikan semua input valid.');
        }

        $data = [
            'question'   => $this->request->getPost('question'),
            'answer'     => $this->request->getPost('answer'),
            'sort_order' => $this->request->getPost('sort_order') ?? 0,
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
        ];

        if ($id) {
            $this->faqModel->update($id, $data);
            $msg = 'FAQ berhasil diperbarui.';
        } else {
            $this->faqModel->insert($data);
            $msg = 'FAQ berhasil ditambahkan.';
        }

        return redirect()->to('admin/faqs')->with('success', $msg);
    }

    public function delete($id)
    {
        if ($this->faqModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'FAQ berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus FAQ.']);
    }
}
