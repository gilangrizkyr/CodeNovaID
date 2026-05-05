<?php

namespace App\Models;

use CodeIgniter\Model;

class InquiryModel extends Model
{
    protected $table            = 'inquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'tracking_code', 'name', 'email', 'phone', 'company', 'position',
        'service_type', 'budget_range', 'timeline', 'project_detail', 
        'reference_url', 'source', 'utm_source', 'utm_medium', 'utm_campaign',
        'status', 'priority', 'notes', 'assigned_to', 'closed_at', 
        'closed_reason', 'ip_address', 'user_agent'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function generateTrackingCode()
    {
        return 'INV-' . strtoupper(substr(uniqid(), -6)) . date('y');
    }
}
