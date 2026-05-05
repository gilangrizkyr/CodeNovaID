<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MediaModel;
use App\Libraries\ImageProcessor;

class MediaController extends BaseController
{
    protected $mediaModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->mediaModel = new MediaModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title' => 'Media Library',
            'media' => $this->mediaModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/media/index', $data);
    }

    public function upload()
    {
        $files = $this->request->getFiles();
        
        if (isset($files['files'])) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $path = $this->imageProcessor->process($file, 'uploads/media');
                    $thumb = $this->imageProcessor->createThumbnail($path);
                    
                    $this->mediaModel->insert([
                        'filename'  => $file->getName(),
                        'file_type' => $file->getClientMimeType(),
                        'file_size' => $file->getSize(),
                        'file_path' => $path,
                        'thumb_path' => $thumb
                    ]);
                }
            }
            return redirect()->to(base_url('admin/media'))->with('success', 'File berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Tidak ada file terpilih.');
    }

    public function delete($id)
    {
        $item = $this->mediaModel->find($id);
        if ($item) {
            if (file_exists(FCPATH . $item->file_path)) @unlink(FCPATH . $item->file_path);
            if (file_exists(FCPATH . $item->thumb_path)) @unlink(FCPATH . $item->thumb_path);
            $this->mediaModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Media dihapus.']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus media.']);
    }
}
