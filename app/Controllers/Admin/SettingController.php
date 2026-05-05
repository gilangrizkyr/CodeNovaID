<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;
use App\Libraries\SettingService;

class SettingController extends BaseController
{
    protected $settingModel;
    protected $settingService;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->settingModel = new \App\Models\SiteSettingModel();
        $this->settingService = new \App\Libraries\SettingService();
    }

    public function index()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to(base_url('admin/dashboard'))->with('error', 'Akses ditolak.');
        }

        $allSettings = $this->settingModel->orderBy('group_name', 'ASC')->findAll();
        
        // Get unique groups from settings
        $groups = [];
        foreach ($allSettings as $s) {
            if (!in_array($s->group_name, $groups)) {
                $groups[] = $s->group_name;
            }
        }

        $data = [
            'title'    => 'Pengaturan Website',
            'groups'   => $groups,
            'settings' => $allSettings
        ];

        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $settings = $this->request->getPost('settings');
        $files = $this->request->getFiles();
        
        if ($settings || $files) {
            // Handle text/boolean/number settings
            if ($settings) {
                foreach ($settings as $key => $value) {
                    $this->db->table('site_settings')
                             ->where('setting_key', $key)
                             ->update(['setting_value' => $value]);
                }
            }

            // Handle image uploads
            if ($files && isset($files['settings'])) {
                $imageProcessor = new \App\Libraries\ImageProcessor();
                foreach ($files['settings'] as $key => $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $path = $imageProcessor->upload($file, 'uploads/settings');
                        if ($path) {
                            $this->db->table('site_settings')
                                     ->where('setting_key', $key)
                                     ->update(['setting_value' => $path]);
                        }
                    }
                }
            }
            
            $this->settingService->clearCache();
            return redirect()->to(base_url('admin/settings'))->with('success', 'Pengaturan berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Tidak ada data yang diubah.');
    }
}
