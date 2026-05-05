<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use Config\Database;

class Newsletter extends BaseController
{
    public function subscribe()
    {
        $email = $this->request->getPost('email');
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Email tidak valid.']);
        }

        $db = Database::connect();
        
        // Check if exists
        $exists = $db->table('newsletter_subscribers')->where('email', $email)->get()->getRow();
        if ($exists) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Anda sudah terdaftar sebelumnya.']);
        }

        $db->table('newsletter_subscribers')->insert([
            'email' => $email,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Terima kasih telah berlangganan!');
    }
}
