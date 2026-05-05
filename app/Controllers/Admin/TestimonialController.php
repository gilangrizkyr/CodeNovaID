<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;
use App\Libraries\ImageProcessor;

class TestimonialController extends BaseController
{
    protected $testimonialModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title'        => 'Manajemen Testimoni',
            'testimonials' => $this->testimonialModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/testimonials/index', $data);
    }

    public function create()
    {
        $data = [
            'title'       => 'Tambah Testimoni',
            'testimonial' => null
        ];

        return view('admin/testimonials/form', $data);
    }

    public function edit($id)
    {
        $testimonial = $this->testimonialModel->find($id);
        if (!$testimonial) {
            return redirect()->to('admin/testimonials')->with('error', 'Testimoni tidak ditemukan.');
        }

        $data = [
            'title'       => 'Edit Testimoni',
            'testimonial' => $testimonial
        ];

        return view('admin/testimonials/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        
        $rules = [
            'client_name' => 'required|min_length[3]',
            'content'     => 'required',
            'rating'      => 'required|is_natural_no_zero|less_than_equal_to[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Pastikan semua input valid.');
        }

        $data = [
            'client_name'    => $this->request->getPost('client_name'),
            'client_company' => $this->request->getPost('client_company'),
            'client_position'=> $this->request->getPost('client_position'),
            'content'        => $this->request->getPost('content'),
            'rating'         => $this->request->getPost('rating'),
            'is_active'      => $this->request->getPost('is_active') ? 1 : 0,
        ];

        // Handle Photo Upload
        $photo = $this->request->getFile('client_photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $data['client_photo'] = $this->imageProcessor->upload($photo, 'uploads/testimonials', 200, 200);
        }

        if ($id) {
            $this->testimonialModel->update($id, $data);
            $msg = 'Testimoni berhasil diperbarui.';
        } else {
            $this->testimonialModel->insert($data);
            $msg = 'Testimoni berhasil ditambahkan.';
        }

        return redirect()->to('admin/testimonials')->with('success', $msg);
    }

    public function delete($id)
    {
        if ($this->testimonialModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Testimoni berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus testimoni.']);
    }
}
