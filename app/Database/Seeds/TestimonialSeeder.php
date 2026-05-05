<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'client_name'    => 'Budi Santoso',
                'client_position'=> 'CEO',
                'client_company' => 'TechSolutions ID',
                'content'        => 'CodeNova membantu kami mentransformasi proses bisnis manual menjadi digital dengan sangat lancar. Hasil aplikasinya luar biasa!',
                'rating'         => 5,
                'is_active'      => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'client_name'    => 'Siti Aminah',
                'client_position'=> 'Marketing Manager',
                'client_company' => 'Global Retail',
                'content'        => 'Tim yang sangat profesional dan responsif. Website e-commerce yang mereka bangun meningkatkan konversi penjualan kami hingga 40%.',
                'rating'         => 5,
                'is_active'      => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'client_name'    => 'Andi Wijaya',
                'client_position'=> 'Founder',
                'client_company' => 'Startup Maju',
                'content'        => 'Pengalaman bekerja dengan CodeNova sangat menyenangkan. Mereka mengerti kebutuhan teknis kami yang kompleks.',
                'rating'         => 4,
                'is_active'      => 1,
                'created_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('testimonials')->insertBatch($data);
    }
}
