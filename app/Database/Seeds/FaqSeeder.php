<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            [
                'question' => 'Berapa lama waktu pembuatan website?',
                'answer'   => 'Estimasi pembuatan website landing page adalah 7-14 hari kerja, tergantung kompleksitas fitur.',
                'category' => 'Umum',
            ],
            [
                'question' => 'Apakah ada biaya maintenance bulanan?',
                'answer'   => 'Kami menyediakan paket maintenance opsional. Untuk tahun pertama, support teknis dasar gratis.',
                'category' => 'Harga',
            ],
            [
                'question' => 'Apakah CodeNova bisa membuat aplikasi iOS?',
                'answer'   => 'Ya, kami melayani pembuatan aplikasi Android dan iOS menggunakan teknologi Native maupun Hybrid seperti Flutter.',
                'category' => 'Layanan',
            ],
            [
                'question' => 'Bagaimana sistem pembayarannya?',
                'answer'   => 'Biasanya 50% DP di awal, dan 50% pelunasan setelah project selesai ditesting dan siap launch.',
                'category' => 'Harga',
            ],
            [
                'question' => 'Apakah saya mendapatkan source code?',
                'answer'   => 'Ya, klien mendapatkan hak akses penuh terhadap source code project yang telah diselesaikan.',
                'category' => 'Umum',
            ],
        ];

        foreach ($faqs as $faq) {
            $faq['created_at'] = date('Y-m-d H:i:s');
            $faq['is_active'] = 1;
            $this->db->table('faqs')->insert($faq);
        }
    }
}
