<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Pertamina', 'logo' => 'https://logo.clearbit.com/pertamina.com', 'is_active' => 1, 'sort_order' => 1],
            ['name' => 'Bank Mandiri', 'logo' => 'https://logo.clearbit.com/bankmandiri.co.id', 'is_active' => 1, 'sort_order' => 2],
            ['name' => 'Telkom Indonesia', 'logo' => 'https://logo.clearbit.com/telkom.co.id', 'is_active' => 1, 'sort_order' => 3],
            ['name' => 'Gojek', 'logo' => 'https://logo.clearbit.com/gojek.com', 'is_active' => 1, 'sort_order' => 4],
            ['name' => 'Tokopedia', 'logo' => 'https://logo.clearbit.com/tokopedia.com', 'is_active' => 1, 'sort_order' => 5],
        ];

        $this->db->table('clients')->insertBatch($data);
    }
}
