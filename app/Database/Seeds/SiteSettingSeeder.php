<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // general
            ['group_name' => 'general', 'setting_key' => 'company_name', 'setting_value' => 'CodeNova Indonesia', 'setting_type' => 'text', 'label' => 'Nama Perusahaan'],
            ['group_name' => 'general', 'setting_key' => 'company_tagline', 'setting_value' => 'Solusi Teknologi Terdepan untuk Bisnis Anda', 'setting_type' => 'text', 'label' => 'Tagline Perusahaan'],
            ['group_name' => 'general', 'setting_key' => 'company_email', 'setting_value' => 'hello@codenova.id', 'setting_type' => 'text', 'label' => 'Email Perusahaan'],
            ['group_name' => 'general', 'setting_key' => 'company_phone', 'setting_value' => '021-12345678', 'setting_type' => 'text', 'label' => 'Telepon Perusahaan'],
            ['group_name' => 'general', 'setting_key' => 'company_whatsapp', 'setting_value' => '6281234567890', 'setting_type' => 'text', 'label' => 'WhatsApp Business'],
            ['group_name' => 'general', 'setting_key' => 'company_address', 'setting_value' => 'Jl. Teknologi No. 101, Jakarta Selatan', 'setting_type' => 'textarea', 'label' => 'Alamat Lengkap'],
            ['group_name' => 'general', 'setting_key' => 'company_city', 'setting_value' => 'Jakarta Selatan', 'setting_type' => 'text', 'label' => 'Kota'],
            ['group_name' => 'general', 'setting_key' => 'company_province', 'setting_value' => 'DKI Jakarta', 'setting_type' => 'text', 'label' => 'Provinsi'],
            ['group_name' => 'general', 'setting_key' => 'company_postal', 'setting_value' => '12345', 'setting_type' => 'text', 'label' => 'Kode Pos'],
            ['group_name' => 'general', 'setting_key' => 'company_logo', 'setting_value' => '', 'setting_type' => 'image', 'label' => 'Logo Perusahaan'],
            ['group_name' => 'general', 'setting_key' => 'company_favicon', 'setting_value' => '', 'setting_type' => 'image', 'label' => 'Favicon'],
            ['group_name' => 'general', 'setting_key' => 'company_og_image', 'setting_value' => '', 'setting_type' => 'image', 'label' => 'Default OG Image'],
            ['group_name' => 'general', 'setting_key' => 'company_founded_year', 'setting_value' => '2020', 'setting_type' => 'number', 'label' => 'Tahun Berdiri'],

            // contact
            ['group_name' => 'contact', 'setting_key' => 'google_maps_embed', 'setting_value' => '', 'setting_type' => 'textarea', 'label' => 'Google Maps Embed Code'],
            ['group_name' => 'contact', 'setting_key' => 'google_maps_url', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'Google Maps URL'],
            ['group_name' => 'contact', 'setting_key' => 'operational_hours', 'setting_value' => 'Senin - Jumat: 09:00 - 18:00', 'setting_type' => 'text', 'label' => 'Jam Operasional'],

            // social
            ['group_name' => 'social', 'setting_key' => 'facebook_url', 'setting_value' => 'https://facebook.com/codenova', 'setting_type' => 'text', 'label' => 'Facebook URL'],
            ['group_name' => 'social', 'setting_key' => 'instagram_url', 'setting_value' => 'https://instagram.com/codenova', 'setting_type' => 'text', 'label' => 'Instagram URL'],
            ['group_name' => 'social', 'setting_key' => 'linkedin_url', 'setting_value' => 'https://linkedin.com/company/codenova', 'setting_type' => 'text', 'label' => 'LinkedIn URL'],
            ['group_name' => 'social', 'setting_key' => 'twitter_url', 'setting_value' => 'https://twitter.com/codenova', 'setting_type' => 'text', 'label' => 'Twitter URL'],
            ['group_name' => 'social', 'setting_key' => 'youtube_url', 'setting_value' => 'https://youtube.com/@codenova', 'setting_type' => 'text', 'label' => 'YouTube URL'],
            ['group_name' => 'social', 'setting_key' => 'tiktok_url', 'setting_value' => 'https://tiktok.com/@codenova', 'setting_type' => 'text', 'label' => 'TikTok URL'],
            ['group_name' => 'social', 'setting_key' => 'github_url', 'setting_value' => 'https://github.com/codenova', 'setting_type' => 'text', 'label' => 'GitHub URL'],
            ['group_name' => 'social', 'setting_key' => 'whatsapp_business_url', 'setting_value' => 'https://wa.me/6281234567890', 'setting_type' => 'text', 'label' => 'WA Business URL'],

            // hero
            ['group_name' => 'hero', 'setting_key' => 'hero_title', 'setting_value' => 'Transformasi Digital Bisnis Anda Bersama CodeNova', 'setting_type' => 'text', 'label' => 'Hero Title'],
            ['group_name' => 'hero', 'setting_key' => 'hero_subtitle', 'setting_value' => 'Kami menghadirkan solusi teknologi inovatif, mulai dari aplikasi mobile hingga sistem enterprise untuk membantu UMKM dan Korporat tumbuh lebih cepat.', 'setting_type' => 'textarea', 'label' => 'Hero Subtitle'],
            ['group_name' => 'hero', 'setting_key' => 'hero_cta_primary_text', 'setting_value' => 'Konsultasi Gratis', 'setting_type' => 'text', 'label' => 'Hero CTA Primary Text'],
            ['group_name' => 'hero', 'setting_key' => 'hero_cta_primary_url', 'setting_value' => '#kontak', 'setting_type' => 'text', 'label' => 'Hero CTA Primary URL'],
            ['group_name' => 'hero', 'setting_key' => 'hero_cta_secondary_text', 'setting_value' => 'Lihat Portofolio', 'setting_type' => 'text', 'label' => 'Hero CTA Secondary Text'],
            ['group_name' => 'hero', 'setting_key' => 'hero_cta_secondary_url', 'setting_value' => '/portofolio', 'setting_type' => 'text', 'label' => 'Hero CTA Secondary URL'],
            ['group_name' => 'hero', 'setting_key' => 'hero_image', 'setting_value' => '', 'setting_type' => 'image', 'label' => 'Hero Image'],
            ['group_name' => 'hero', 'setting_key' => 'hero_badge_text', 'setting_value' => '🚀 Jasa Teknologi Terpercaya', 'setting_type' => 'text', 'label' => 'Hero Badge Text'],

            // about
            ['group_name' => 'about', 'setting_key' => 'about_story', 'setting_value' => 'CodeNova adalah tim profesional IT yang berdedikasi untuk memberikan solusi digital terbaik di Indonesia.', 'setting_type' => 'textarea', 'label' => 'Our Story'],
            ['group_name' => 'about', 'setting_key' => 'about_vision', 'setting_value' => 'Menjadi mitra teknologi nomor satu untuk digitalisasi bisnis di Indonesia.', 'setting_type' => 'textarea', 'label' => 'Visi'],
            ['group_name' => 'about', 'setting_key' => 'about_mission', 'setting_value' => 'Memberikan layanan IT berkualitas, transparan, dan berdampak nyata bagi klien.', 'setting_type' => 'textarea', 'label' => 'Misi'],
            ['group_name' => 'about', 'setting_key' => 'about_image', 'setting_value' => '', 'setting_type' => 'image', 'label' => 'About Image'],

            // stats
            ['group_name' => 'stats', 'setting_key' => 'stats_clients', 'setting_value' => '50', 'setting_type' => 'number', 'label' => 'Total Klien'],
            ['group_name' => 'stats', 'setting_key' => 'stats_projects', 'setting_value' => '120', 'setting_type' => 'number', 'label' => 'Project Selesai'],
            ['group_name' => 'stats', 'setting_key' => 'stats_years', 'setting_value' => '5', 'setting_type' => 'number', 'label' => 'Tahun Pengalaman'],
            ['group_name' => 'stats', 'setting_key' => 'stats_retention', 'setting_value' => '95', 'setting_type' => 'number', 'label' => 'Client Retention (%)'],

            // footer
            ['group_name' => 'footer', 'setting_key' => 'footer_tagline', 'setting_value' => 'Membangun masa depan digital Indonesia.', 'setting_type' => 'text', 'label' => 'Footer Tagline'],
            ['group_name' => 'footer', 'setting_key' => 'footer_copyright', 'setting_value' => '&copy; 2025 CodeNova Indonesia. All rights reserved.', 'setting_type' => 'text', 'label' => 'Footer Copyright'],

            // seo
            ['group_name' => 'seo', 'setting_key' => 'meta_title_default', 'setting_value' => 'CodeNova - Jasa Pembuatan Website & Aplikasi Mobile Indonesia', 'setting_type' => 'text', 'label' => 'Meta Title Default'],
            ['group_name' => 'seo', 'setting_key' => 'meta_description_default', 'setting_value' => 'Jasa pembuatan website, aplikasi mobile Android/iOS, sistem informasi ERP, dan konsultasi IT profesional di Indonesia.', 'setting_type' => 'textarea', 'label' => 'Meta Description Default'],
            ['group_name' => 'seo', 'setting_key' => 'google_site_verification', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'Google Site Verification'],
            ['group_name' => 'seo', 'setting_key' => 'bing_site_verification', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'Bing Site Verification'],

            // email
            ['group_name' => 'email', 'setting_key' => 'smtp_host', 'setting_value' => 'smtp.mailtrap.io', 'setting_type' => 'text', 'label' => 'SMTP Host'],
            ['group_name' => 'email', 'setting_key' => 'smtp_port', 'setting_value' => '2525', 'setting_type' => 'text', 'label' => 'SMTP Port'],
            ['group_name' => 'email', 'setting_key' => 'smtp_encryption', 'setting_value' => 'tls', 'setting_type' => 'text', 'label' => 'SMTP Encryption'],
            ['group_name' => 'email', 'setting_key' => 'smtp_user', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'SMTP Username'],
            ['group_name' => 'email', 'setting_key' => 'smtp_pass', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'SMTP Password'],
            ['group_name' => 'email', 'setting_key' => 'smtp_from_email', 'setting_value' => 'noreply@codenova.id', 'setting_type' => 'text', 'label' => 'From Email'],
            ['group_name' => 'email', 'setting_key' => 'smtp_from_name', 'setting_value' => 'CodeNova Notification', 'setting_type' => 'text', 'label' => 'From Name'],

            // integration
            ['group_name' => 'integration', 'setting_key' => 'google_analytics_id', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'Google Analytics ID'],
            ['group_name' => 'integration', 'setting_key' => 'google_tag_manager_id', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'Google Tag Manager ID'],
            ['group_name' => 'integration', 'setting_key' => 'facebook_pixel_id', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'Facebook Pixel ID'],
            ['group_name' => 'integration', 'setting_key' => 'recaptcha_site_key', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'reCAPTCHA Site Key'],
            ['group_name' => 'integration', 'setting_key' => 'recaptcha_secret_key', 'setting_value' => '', 'setting_type' => 'text', 'label' => 'reCAPTCHA Secret Key'],

            // performance
            ['group_name' => 'performance', 'setting_key' => 'cache_enabled', 'setting_value' => '0', 'setting_type' => 'boolean', 'label' => 'Enable Cache'],
            ['group_name' => 'performance', 'setting_key' => 'cache_duration_minutes', 'setting_value' => '60', 'setting_type' => 'number', 'label' => 'Cache Duration (Minutes)'],

            // maintenance
            ['group_name' => 'maintenance', 'setting_key' => 'maintenance_mode', 'setting_value' => '0', 'setting_type' => 'boolean', 'label' => 'Maintenance Mode'],
            ['group_name' => 'maintenance', 'setting_key' => 'maintenance_message', 'setting_value' => 'Kami sedang melakukan pemeliharaan rutin. Silakan kembali lagi nanti.', 'setting_type' => 'textarea', 'label' => 'Maintenance Message'],
            ['group_name' => 'maintenance', 'setting_key' => 'maintenance_allowed_ips', 'setting_value' => '127.0.0.1', 'setting_type' => 'textarea', 'label' => 'Allowed IPs'],

            // promo
            ['group_name' => 'promo', 'setting_key' => 'promo_banner_active', 'setting_value' => '0', 'setting_type' => 'boolean', 'label' => 'Show Promo Banner'],
            ['group_name' => 'promo', 'setting_key' => 'promo_banner_text', 'setting_value' => 'Diskon 20% untuk pembuatan Website Landing Page bulan ini!', 'setting_type' => 'text', 'label' => 'Promo Banner Text'],
            ['group_name' => 'promo', 'setting_key' => 'promo_banner_link', 'setting_value' => '/layanan/website', 'setting_type' => 'text', 'label' => 'Promo Link'],
            ['group_name' => 'promo', 'setting_key' => 'promo_banner_color', 'setting_value' => '#0066FF', 'setting_type' => 'color', 'label' => 'Banner Color'],
        ];

        foreach ($settings as $setting) {
            $this->db->table('site_settings')->insert($setting);
        }
    }
}
