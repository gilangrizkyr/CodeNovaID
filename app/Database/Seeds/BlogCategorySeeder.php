<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Teknologi', 'slug' => 'teknologi'],
            ['name' => 'Tutorial', 'slug' => 'tutorial'],
            ['name' => 'Tips Bisnis', 'slug' => 'tips-bisnis'],
            ['name' => 'Case Study', 'slug' => 'case-study'],
            ['name' => 'Berita IT', 'slug' => 'berita-it'],
        ];

        foreach ($categories as $cat) {
            $cat['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('blog_categories')->insert($cat);
        }
    }
}
