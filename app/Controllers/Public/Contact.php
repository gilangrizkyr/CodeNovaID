<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\InquiryModel;

class Contact extends BaseController
{
    protected $inquiryModel;

    public function __construct()
    {
        $this->inquiryModel = new InquiryModel();
    }

    public function index()
    {
        $data = [
            'seo' => [
                'title' => 'Hubungi Kami',
                'description' => 'Konsultasikan kebutuhan teknologi Anda dengan tim ahli CodeNova.'
            ],
            'preselected_service' => $this->request->getGet('service')
        ];

        return view('public/contact', $data);
    }

    public function submit()
    {
        if (!$this->validate('contact')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['tracking_code'] = $this->inquiryModel->generateTrackingCode();
        $data['ip_address'] = $this->request->getIPAddress();
        $data['status'] = 'new';

        $this->inquiryModel->insert($data);

        return redirect()->to(base_url('kontak'))->with('success', 'Pesan Anda telah berhasil dikirim. Kode tracking Anda adalah: ' . $data['tracking_code']);
    }
}
