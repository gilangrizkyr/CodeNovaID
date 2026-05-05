<?php

namespace App\Libraries;

use App\Models\ActivityLogModel;
use Config\Services;

class ActivityService
{
    protected $model;

    public function __construct()
    {
        $this->model = new ActivityLogModel();
    }

    public function log($activity, $adminId = null)
    {
        $request = Services::request();
        
        $data = [
            'admin_id'    => $adminId ?? session()->get('admin_id'),
            'admin_name'  => session()->get('name'),
            'action'      => 'system',
            'description' => $activity,
            'ip_address'  => $request->getIPAddress(),
            'user_agent'  => $request->getUserAgent()->getAgentString(),
        ];

        return $this->model->insert($data);
    }

    public function getRecent($limit = 10)
    {
        return $this->model->select('activity_logs.*, admin_users.name as admin_name')
                           ->join('admin_users', 'admin_users.id = activity_logs.admin_id', 'left')
                           ->orderBy('created_at', 'DESC')
                           ->limit($limit)
                           ->get()
                           ->getResult();
    }
}
