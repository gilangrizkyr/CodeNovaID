<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamMemberModel;
use App\Libraries\ImageProcessor;

class TeamMemberController extends BaseController
{
    protected $teamModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->teamModel = new TeamMemberModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Tim',
            'team'  => $this->teamModel->orderBy('sort_order', 'ASC')->findAll()
        ];

        return view('admin/team/index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Tambah Anggota Tim',
            'member' => null
        ];

        return view('admin/team/form', $data);
    }

    public function edit($id)
    {
        $member = $this->teamModel->find($id);
        if (!$member) {
            return redirect()->to('admin/team')->with('error', 'Anggota tim tidak ditemukan.');
        }

        $data = [
            'title'  => 'Edit Anggota Tim',
            'member' => $member
        ];

        return view('admin/team/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        
        $rules = [
            'name'     => 'required|min_length[3]',
            'position' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Pastikan semua input valid.');
        }

        $data = [
            'name'          => $this->request->getPost('name'),
            'position'      => $this->request->getPost('position'),
            'department'    => $this->request->getPost('department'),
            'bio'           => $this->request->getPost('bio'),
            'email'         => $this->request->getPost('email'),
            'linkedin_url'  => $this->request->getPost('linkedin_url'),
            'twitter_url'   => $this->request->getPost('twitter_url'),
            'instagram_url' => $this->request->getPost('instagram_url'),
            'github_url'    => $this->request->getPost('github_url'),
            'is_founder'    => $this->request->getPost('is_founder') ? 1 : 0,
            'sort_order'    => $this->request->getPost('sort_order') ?? 0,
            'is_active'     => $this->request->getPost('is_active') ? 1 : 0,
        ];

        // Handle Skills (Expertise) - Convert comma separated to JSON
        $skillsInput = $this->request->getPost('skills');
        if ($skillsInput) {
            $skillsArray = array_map('trim', explode(',', $skillsInput));
            $data['skills'] = json_encode($skillsArray);
        }

        // Generate Slug
        $data['slug'] = url_title($data['name'], '-', true);

        // Handle Photo Upload
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $data['photo'] = $this->imageProcessor->upload($photo, 'uploads/team', 400, 400);
        }

        if ($id) {
            $this->teamModel->update($id, $data);
            $msg = 'Data tim berhasil diperbarui.';
        } else {
            $this->teamModel->insert($data);
            $msg = 'Data tim berhasil ditambahkan.';
        }

        return redirect()->to('admin/team')->with('success', $msg);
    }

    public function delete($id)
    {
        if ($this->teamModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Anggota tim berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus anggota tim.']);
    }
}
