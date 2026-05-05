<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Database;

class SubscriberController extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        $data = [
            'title' => 'Subscriber Newsletter',
            'subscribers' => $db->table('newsletter_subscribers')->orderBy('created_at', 'DESC')->get()->getResult()
        ];
        return view('admin/subscribers/index', $data);
    }

    public function toggle($id)
    {
        $db = Database::connect();
        $sub = $db->table('newsletter_subscribers')->where('id', $id)->get()->getRow();
        if ($sub) {
            $db->table('newsletter_subscribers')->where('id', $id)->update(['is_active' => !$sub->is_active]);
        }
        return redirect()->back()->with('success', 'Status subscriber diperbarui.');
    }

    public function delete($id)
    {
        $db = Database::connect();
        $db->table('newsletter_subscribers')->where('id', $id)->delete();
        return $this->response->setJSON(['status' => 'success']);
    }
}
