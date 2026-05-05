<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table            = 'activity_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['admin_id', 'admin_name', 'action', 'module', 'module_id', 'description', 'old_data', 'new_data', 'ip_address', 'user_agent'];

    protected $useTimestamps = true;
    protected $updatedField  = ''; // No updated_at for logs
}
