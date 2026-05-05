<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'       => 'Super Admin',
            'email'      => 'admin@yourdomain.com',
            'password'   => password_hash('Admin@12345', PASSWORD_BCRYPT, ['cost' => 12]),
            'role'       => 'superadmin',
            'is_active'  => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('admin_users')->insert($data);
    }
}
