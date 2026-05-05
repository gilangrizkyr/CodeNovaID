<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InquiryModel;
use App\Models\InquiryReplyModel;

class InquiryController extends BaseController
{
    protected $inquiryModel;
    protected $replyModel;

    public function __construct()
    {
        $this->inquiryModel = new InquiryModel();
        $this->replyModel = new InquiryReplyModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Inquiry & Leads',
            'inquiries' => $this->inquiryModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/inquiries/index', $data);
    }

    public function show($id)
    {
        $inquiry = $this->inquiryModel->find($id);
        if (!$inquiry) {
            return redirect()->to(base_url('admin/inquiries'))->with('error', 'Data tidak ditemukan.');
        }

        // Mark as seen if status is 'new'
        if ($inquiry->status === 'new') {
            $this->inquiryModel->update($id, ['status' => 'processed']);
            $inquiry->status = 'processed';
        }

        $data = [
            'title' => 'Detail Inquiry: ' . $inquiry->tracking_code,
            'inquiry' => $inquiry,
            'replies' => $this->replyModel->getByInquiry($id)
        ];

        return view('admin/inquiries/show', $data);
    }

    public function reply($id)
    {
        $message = $this->request->getPost('message');
        if (empty($message)) {
            return redirect()->back()->with('error', 'Pesan balasan tidak boleh kosong.');
        }

        $this->replyModel->insert([
            'inquiry_id' => $id,
            'admin_id'   => session()->get('admin_id'),
            'message'    => $message,
            'is_sent_email' => 0 // In real prod, this would trigger an Email library
        ]);

        return redirect()->to(base_url('admin/inquiries/view/'.$id))->with('success', 'Balasan berhasil disimpan.');
    }

    public function delete($id)
    {
        if ($this->inquiryModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data.']);
    }
}
