<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    public function run()
    {
        $templates = [
            [
                'name' => 'inquiry_received',
                'subject' => 'Kami Telah Menerima Inquiry Anda - {tracking_code}',
                'body' => '<p>Halo {name},</p><p>Terima kasih telah menghubungi CodeNova. Kami telah menerima inquiry Anda dengan detail sebagai berikut:</p><p><strong>Service:</strong> {service_type}<br><strong>Detail:</strong> {project_detail}</p><p>Tim kami akan segera menghubungi Anda dalam waktu 1x24 jam.</p>',
                'variables' => json_encode(['name', 'tracking_code', 'service_type', 'project_detail']),
            ],
            [
                'name' => 'welcome_subscriber',
                'subject' => 'Selamat Datang di Newsletter CodeNova',
                'body' => '<p>Halo,</p><p>Terima kasih telah berlangganan newsletter kami. Anda akan mendapatkan update terbaru seputar teknologi dan promo menarik dari kami.</p>',
                'variables' => json_encode(['name', 'email']),
            ],
            [
                'name' => 'order_confirmed',
                'subject' => 'Pesanan Anda Telah Dikonfirmasi - {order_number}',
                'body' => '<p>Halo {customer_name},</p><p>Pesanan Anda dengan nomor {order_number} telah kami konfirmasi dan sedang dalam proses.</p>',
                'variables' => json_encode(['customer_name', 'order_number']),
            ],
        ];

        foreach ($templates as $tpl) {
            $tpl['is_active'] = 1;
            $this->db->table('email_templates')->insert($tpl);
        }
    }
}
