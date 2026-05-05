<?php

namespace App\Models;

use CodeIgniter\Model;

class InquiryReplyModel extends Model
{
    protected $table            = 'inquiry_replies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['inquiry_id', 'admin_id', 'message', 'is_sent_email'];

    protected $useTimestamps = true;

    public function getByInquiry(int $inquiryId)
    {
        return $this->select('inquiry_replies.*, admin_users.name as admin_name')
                    ->join('admin_users', 'admin_users.id = inquiry_replies.admin_id')
                    ->where('inquiry_id', $inquiryId)
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }
}
