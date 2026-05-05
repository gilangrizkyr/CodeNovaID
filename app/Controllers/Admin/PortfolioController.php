<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PortfolioModel;
use App\Models\PortfolioImageModel;
use App\Models\ServiceModel;
use App\Libraries\ImageProcessor;

class PortfolioController extends BaseController
{
    protected $portfolioModel;
    protected $imageModel;
    protected $serviceModel;
    protected $imageProcessor;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
        $this->imageModel = new PortfolioImageModel();
        $this->serviceModel = new ServiceModel();
        $this->imageProcessor = new ImageProcessor();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Portofolio',
            'portfolios' => $this->portfolioModel->getWithService()
        ];

        return view('admin/portfolios/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Portofolio Baru',
            'portfolio' => null,
            'services' => $this->serviceModel->orderBy('title', 'ASC')->findAll()
        ];

        return view('admin/portfolios/form', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        
        // Slug generation from title if not provided or for safety
        if (empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], '-', true);
        }

        // Handle Thumbnail
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/portfolios');
        }

        $portfolioId = $this->portfolioModel->insert($data);

        // Handle Gallery Images
        $gallery = $this->request->getFiles();
        if (isset($gallery['gallery'])) {
            foreach ($gallery['gallery'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $path = $this->imageProcessor->process($img, 'uploads/portfolios/gallery');
                    $thumb = $this->imageProcessor->createThumbnail($path);
                    
                    $this->imageModel->insert([
                        'portfolio_id' => $portfolioId,
                        'image_path' => $path,
                        'thumb_path' => $thumb
                    ]);
                }
            }
        }

        return redirect()->to(base_url('admin/portfolios'))->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            return redirect()->to(base_url('admin/portfolios'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Portofolio: ' . $portfolio->title,
            'portfolio' => $portfolio,
            'services' => $this->serviceModel->orderBy('title', 'ASC')->findAll(),
            'gallery' => $this->imageModel->getByPortfolio($id)
        ];

        return view('admin/portfolios/form', $data);
    }

    public function update($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        $data = $this->request->getPost();

        // Handle Thumbnail
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            if ($portfolio->thumbnail && file_exists(FCPATH . $portfolio->thumbnail)) {
                @unlink(FCPATH . $portfolio->thumbnail);
            }
            $data['thumbnail'] = $this->imageProcessor->process($file, 'uploads/portfolios');
        }

        $this->portfolioModel->update($id, $data);

        // Handle New Gallery Images
        $gallery = $this->request->getFiles();
        if (isset($gallery['gallery'])) {
            foreach ($gallery['gallery'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $path = $this->imageProcessor->process($img, 'uploads/portfolios/gallery');
                    $thumb = $this->imageProcessor->createThumbnail($path);
                    
                    $this->imageModel->insert([
                        'portfolio_id' => $id,
                        'image_path' => $path,
                        'thumb_path' => $thumb
                    ]);
                }
            }
        }

        return redirect()->to(base_url('admin/portfolios'))->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function delete($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if ($portfolio) {
            // Delete images
            if ($portfolio->thumbnail && file_exists(FCPATH . $portfolio->thumbnail)) {
                @unlink(FCPATH . $portfolio->thumbnail);
            }
            
            $gallery = $this->imageModel->getByPortfolio($id);
            foreach ($gallery as $img) {
                if (file_exists(FCPATH . $img->image_path)) @unlink(FCPATH . $img->image_path);
                if (file_exists(FCPATH . $img->thumb_path)) @unlink(FCPATH . $img->thumb_path);
            }

            $this->portfolioModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Portofolio berhasil dihapus.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data.'])->setStatusCode(404);
    }

    public function deleteImage($id)
    {
        $img = $this->imageModel->find($id);
        if ($img) {
            if (file_exists(FCPATH . $img->image_path)) @unlink(FCPATH . $img->image_path);
            if (file_exists(FCPATH . $img->thumb_path)) @unlink(FCPATH . $img->thumb_path);
            $this->imageModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Foto galeri dihapus.']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus foto.']);
    }
}
