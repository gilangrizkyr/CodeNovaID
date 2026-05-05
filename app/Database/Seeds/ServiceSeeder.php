<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'title' => 'Pembuatan Aplikasi Mobile',
                'slug' => 'aplikasi-mobile',
                'short_description' => 'Aplikasi Android & iOS native atau hybrid dengan performa tinggi.',
                'price_start' => 15000000,
                'is_featured' => 1,
                'sort_order' => 1,
            ],
            [
                'title' => 'Pembuatan Website & Landing Page',
                'slug' => 'website-landing-page',
                'short_description' => 'Website profesional, responsif, dan SEO friendly untuk bisnis Anda.',
                'price_start' => 5000000,
                'is_featured' => 1,
                'sort_order' => 2,
            ],
            [
                'title' => 'Sistem Informasi & ERP',
                'slug' => 'sistem-informasi-erp',
                'short_description' => 'Custom system untuk otomasi proses bisnis dan manajemen data.',
                'price_start' => 25000000,
                'is_featured' => 1,
                'sort_order' => 3,
            ],
            [
                'title' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'short_description' => 'Desain antarmuka yang modern dan pengalaman pengguna yang intuitif.',
                'price_start' => 3000000,
                'is_featured' => 0,
                'sort_order' => 4,
            ],
            [
                'title' => 'Pengadaan Produk IT',
                'slug' => 'pengadaan-produk-it',
                'short_description' => 'Penyediaan perangkat keras dan lunak bergaransi resmi.',
                'price_start' => 0,
                'is_featured' => 0,
                'sort_order' => 5,
            ],
            [
                'title' => 'Konsultasi Teknologi',
                'slug' => 'konsultasi-teknologi',
                'short_description' => 'Audit IT dan strategi transformasi digital untuk perusahaan.',
                'price_start' => 0,
                'is_featured' => 0,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            $service['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('services')->insert($service);
        }
    }
}
