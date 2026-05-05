<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminUserModel extends Model
{
    protected $table            = 'admin_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'email', 'password', 'role', 'is_active', 
        'last_login', 'login_token', 'reset_token', 'reset_expires'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getByEmail(string $email)
    {
        return $this->where('email', $email)->where('is_active', 1)->first();
    }

    public function updateLogin(int $id)
    {
        return $this->update($id, [
            'last_login' => date('Y-m-d H:i:s')
        ]);
    }
}
