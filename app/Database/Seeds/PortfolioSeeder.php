<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'       => 'Sistem ERP Manufaktur',
                'slug'        => 'sistem-erp-manufaktur',
                'service_id'  => 1,
                'client_name' => 'PT Manufaktur Jaya',
                'short_description' => 'Implementasi sistem ERP terpadu untuk mengelola rantai pasok dan produksi.',
                'description' => 'Project ini melibatkan pengembangan modul inventaris, keuangan, dan manajemen produksi yang saling terintegrasi untuk memberikan visibilitas operasional yang lengkap kepada manajemen.',
                'challenge'   => 'Proses manual yang menyebabkan inefisiensi data.',
                'solution'    => 'Membangun dashboard real-time untuk monitoring produksi.',
                'result'      => 'Efisiensi operasional meningkat sebesar 30%.',
                'project_year' => 2024,
                'is_active'   => 1,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'title'       => 'Aplikasi Mobile E-Commerce',
                'slug'        => 'aplikasi-mobile-e-commerce',
                'service_id'  => 2,
                'client_name' => 'Fashion Hub',
                'short_description' => 'Pengembangan aplikasi mobile belanja online untuk platform iOS dan Android.',
                'description' => 'Aplikasi e-commerce modern dengan fitur real-time tracking, integrasi payment gateway, dan sistem rekomendasi produk berbasis AI.',
                'challenge'   => 'Kebutuhan akan pengalaman belanja yang cepat dan responsif.',
                'solution'    => 'Menggunakan Flutter untuk performa native yang optimal.',
                'result'      => 'Lebih dari 10.000 unduhan dalam bulan pertama.',
                'project_year' => 2023,
                'is_active'   => 1,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('portfolios')->insertBatch($data);
    }
}
