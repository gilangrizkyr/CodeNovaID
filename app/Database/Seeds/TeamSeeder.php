<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'      => 'Gilang Pratama',
                'position'  => 'Chief Executive Officer',
                'bio'       => 'Berpengalaman lebih dari 10 tahun di industri teknologi.',
                'is_active' => 1,
                'sort_order'=> 1
            ],
            [
                'name'      => 'Reza Aditya',
                'position'  => 'Chief Technology Officer',
                'bio'       => 'Expert dalam arsitektur cloud dan skalabilitas sistem.',
                'is_active' => 1,
                'sort_order'=> 2
            ],
            [
                'name'      => 'Linda Sari',
                'position'  => 'Creative Director',
                'bio'       => 'Spesialis dalam UI/UX design dan branding strategis.',
                'is_active' => 1,
                'sort_order'=> 3
            ],
        ];

        $this->db->table('team_members')->insertBatch($data);
    }
}
