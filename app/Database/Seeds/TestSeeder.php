<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $db->query("DELETE FROM products");
        $data = [
            'name' => 'Test Product',
            'slug' => 'test-product',
            'price' => 1000,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $db->table('products')->insert($data);
        echo "Test product inserted!\n";
    }
}
