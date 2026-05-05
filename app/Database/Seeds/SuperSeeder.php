<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuperSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        echo "Starting SuperSeeder...\n";

        // Truncate existing data to avoid duplicates
        $db->query('SET FOREIGN_KEY_CHECKS = 0');
        $tables = ['services', 'team_members', 'clients', 'portfolios', 'blog_posts', 'faqs', 'testimonials', 'products', 'blog_categories', 'admin_users'];
        foreach ($tables as $table) {
            echo "Clearing table: $table\n";
            $db->query("DELETE FROM $table");
            $db->query("ALTER TABLE $table AUTO_INCREMENT = 1");
        }
        $db->query('SET FOREIGN_KEY_CHECKS = 1');

        // Create Default Admin
        echo "Seeding admin_users...\n";
        $db->table('admin_users')->insert([
            'name' => 'Gilang Ramadhan',
            'email' => 'admin@codenova.id',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'superadmin',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $adminId = $db->insertID();

        // Create Blog Categories
        echo "Seeding blog_categories...\n";
        $categories = ['Technology', 'Business', 'Creative', 'Lifestyle', 'News'];
        $catIds = [];
        foreach ($categories as $cat) {
            $db->table('blog_categories')->insert([
                'name' => $cat,
                'slug' => url_title($cat, '-', true),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $catIds[] = $db->insertID();
        }

        // 1. SERVICES (10 items)
        echo "Seeding services...\n";
        $services = [
            ['title' => 'Web Development', 'slug' => 'web-development', 'short_description' => 'Custom website development using modern frameworks like Laravel and React.', 'price_start' => 5000000, 'thumbnail' => 'uploads/services/web.jpg'],
            ['title' => 'Mobile App Development', 'slug' => 'mobile-app-development', 'short_description' => 'High-performance Android and iOS applications built with Flutter or React Native.', 'price_start' => 15000000, 'thumbnail' => 'uploads/services/mobile.jpg'],
            ['title' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'short_description' => 'User-centric interface design and experience mapping for digital products.', 'price_start' => 3000000, 'thumbnail' => 'uploads/services/web.jpg'],
            ['title' => 'E-Commerce Solution', 'slug' => 'e-commerce-solution', 'short_description' => 'Building scalable online stores with integrated payment gateways.', 'price_start' => 8000000, 'thumbnail' => 'uploads/services/mobile.jpg'],
            ['title' => 'Cloud Infrastructure', 'slug' => 'cloud-infrastructure', 'short_description' => 'Setup and management of AWS, Google Cloud, and Azure environments.', 'price_start' => 2000000, 'thumbnail' => 'uploads/services/web.jpg'],
            ['title' => 'Cyber Security Audit', 'slug' => 'cyber-security-audit', 'short_description' => 'Vulnerability assessment and penetration testing for enterprise systems.', 'price_start' => 10000000, 'thumbnail' => 'uploads/services/mobile.jpg'],
            ['title' => 'SEO & Digital Marketing', 'slug' => 'seo-digital-marketing', 'short_description' => 'Boosting your online presence and search engine rankings.', 'price_start' => 1500000, 'thumbnail' => 'uploads/services/web.jpg'],
            ['title' => 'Custom Software', 'slug' => 'custom-software', 'short_description' => 'Tailor-made software solutions to automate your business processes.', 'price_start' => 20000000, 'thumbnail' => 'uploads/services/mobile.jpg'],
            ['title' => 'Data Analytics', 'slug' => 'data-analytics', 'short_description' => 'Transforming raw data into actionable business insights.', 'price_start' => 7000000, 'thumbnail' => 'uploads/services/web.jpg'],
            ['title' => 'Maintenance & Support', 'slug' => 'maintenance-support', 'short_description' => 'Reliable technical support and regular system updates.', 'price_start' => 1000000, 'thumbnail' => 'uploads/services/mobile.jpg'],
        ];

        $serviceIds = [];
        foreach ($services as $s) {
            $s['is_active'] = 1;
            $s['created_at'] = date('Y-m-d H:i:s');
            $s['full_description'] = 'This is a long description for ' . $s['title'] . '. We provide end-to-end solutions including planning, design, and deployment.';
            $db->table('services')->insert($s);
            $serviceIds[] = $db->insertID();
        }

        // 2. TEAM MEMBERS (12 items)
        echo "Seeding team_members...\n";
        $team = [
            ['name' => 'Gilang Ramadhan', 'position' => 'CEO & Founder', 'department' => 'Management'],
            ['name' => 'Sarah Wijaya', 'position' => 'CTO', 'department' => 'Technology'],
            ['name' => 'Budi Santoso', 'position' => 'Senior Developer', 'department' => 'Engineering'],
            ['name' => 'Linda Putri', 'position' => 'UI/UX Designer', 'department' => 'Creative'],
            ['name' => 'Andi Pratama', 'position' => 'Backend Engineer', 'department' => 'Engineering'],
            ['name' => 'Santi Rahayu', 'position' => 'Marketing Lead', 'department' => 'Business'],
            ['name' => 'Rizky Fadillah', 'position' => 'Mobile Developer', 'department' => 'Engineering'],
            ['name' => 'Dewi Lestari', 'position' => 'HR Manager', 'department' => 'Management'],
            ['name' => 'Aditya Nugraha', 'position' => 'DevOps Engineer', 'department' => 'Technology'],
            ['name' => 'Maya Indah', 'position' => 'Content Creator', 'department' => 'Creative'],
            ['name' => 'Hendra Wijaya', 'position' => 'Data Scientist', 'department' => 'Technology'],
            ['name' => 'Nina Kartika', 'position' => 'Support Specialist', 'department' => 'Service'],
        ];

        foreach ($team as $t) {
            $t['slug'] = url_title($t['name'], '-', true);
            $t['photo'] = 'uploads/team/member.jpg';
            $t['is_active'] = 1;
            $t['created_at'] = date('Y-m-d H:i:s');
            $t['bio'] = 'Professional with years of experience in ' . $t['department'] . '. Dedicated to delivering excellence at CodeNova Indonesia with passion and integrity.';
            $t['linkedin_url'] = 'https://linkedin.com/in/' . $t['slug'];
            $t['instagram_url'] = 'https://instagram.com/' . $t['slug'];
            $t['twitter_url'] = 'https://twitter.com/' . $t['slug'];
            $t['github_url'] = 'https://github.com/' . $t['slug'];
            $t['email'] = str_replace('-', '.', $t['slug']) . '@codenova.id';
            $t['skills'] = json_encode(['Leadership', 'Strategy', 'Tech Stack', 'Management']);
            $db->table('team_members')->insert($t);
        }

        // 3. CLIENTS (10 items)
        echo "Seeding clients...\n";
        $clients = [
            ['name' => 'Pertamina', 'industry' => 'Energy'],
            ['name' => 'Bank Mandiri', 'industry' => 'Finance'],
            ['name' => 'Telkom Indonesia', 'industry' => 'Telecommunication'],
            ['name' => 'Traveloka', 'industry' => 'Tech'],
            ['name' => 'Gojek', 'industry' => 'Tech'],
            ['name' => 'Indofood', 'industry' => 'F&B'],
            ['name' => 'Unilever', 'industry' => 'Consumer Goods'],
            ['name' => 'Astra International', 'industry' => 'Automotive'],
            ['name' => 'BCA', 'industry' => 'Finance'],
            ['name' => 'Tokopedia', 'industry' => 'E-Commerce'],
        ];

        foreach ($clients as $c) {
            $c['logo'] = 'uploads/clients/logo.jpg';
            $c['is_active'] = 1;
            $c['created_at'] = date('Y-m-d H:i:s');
            $db->table('clients')->insert($c);
        }

        // 4. PORTFOLIOS (10 items)
        echo "Seeding portfolios...\n";
        $portfolios = [
            ['title' => 'E-Learning Platform', 'client_name' => 'EduTech Corp'],
            ['title' => 'Smart Warehouse System', 'client_name' => 'LogiTrack'],
            ['title' => 'Fintech Mobile App', 'client_name' => 'CashFlow Inc'],
            ['title' => 'Healthcare Dashboard', 'client_name' => 'MediCare'],
            ['title' => 'Retail POS System', 'client_name' => 'ShopSmart'],
            ['title' => 'Property Portal', 'client_name' => 'IndoProperty'],
            ['title' => 'Tourism Mobile App', 'client_name' => 'VisitIndo'],
            ['title' => 'Fleet Management', 'client_name' => 'TransCargo'],
            ['title' => 'HR Payroll System', 'client_name' => 'WorkForce'],
            ['title' => 'Social Networking App', 'client_name' => 'ConnectAll'],
        ];

        foreach ($portfolios as $idx => $p) {
            $p['service_id'] = $serviceIds[$idx % count($serviceIds)];
            $p['thumbnail'] = 'uploads/portfolios/project.jpg';
            $p['slug'] = url_title($p['title'], '-', true);
            $p['is_active'] = 1;
            $p['created_at'] = date('Y-m-d H:i:s');
            $p['short_description'] = 'Successful project delivery for ' . $p['client_name'] . ' with high client satisfaction.';
            $db->table('portfolios')->insert($p);
        }

        // 5. BLOG POSTS (10 items)
        echo "Seeding blog_posts...\n";
        $blogs = [
            ['title' => 'Trend Web Development 2026'],
            ['title' => 'Pentingnya UI/UX bagi Startup'],
            ['title' => 'Mengapa Flutter Masih Unggul?'],
            ['title' => 'Cyber Security di Era AI'],
            ['title' => 'Digital Marketing vs Tradisional'],
            ['title' => 'Membangun Cloud yang Efisien'],
            ['title' => 'Data Science untuk UKM'],
            ['title' => 'Tips Maintenance Server'],
            ['title' => 'E-Commerce Branding 101'],
            ['title' => 'Masa Depan Mobile Apps'],
        ];

        foreach ($blogs as $idx => $b) {
            $b['admin_id'] = $adminId;
            $b['category_id'] = $catIds[$idx % count($catIds)];
            $b['thumbnail'] = 'uploads/blog/tech.jpg';
            $b['slug'] = url_title($b['title'], '-', true);
            $b['status'] = 'published';
            $b['created_at'] = date('Y-m-d H:i:s');
            $b['excerpt'] = 'Pelajari lebih lanjut tentang ' . $b['title'] . ' dalam artikel mendalam kami.';
            $b['content'] = '<p>Konten lengkap mengenai ' . $b['title'] . ' tersedia di sini. CodeNova selalu memberikan update teknologi terbaru.</p>';
            $db->table('blog_posts')->insert($b);
        }

        // 6. FAQS (10 items)
        echo "Seeding faqs...\n";
        $faqs = [
            ['question' => 'Berapa lama pengerjaan satu website?', 'answer' => 'Rata-rata 2-4 minggu tergantung kompleksitas.'],
            ['question' => 'Apakah ada biaya maintenance?', 'answer' => 'Ya, kami menyediakan paket maintenance bulanan yang terjangkau.'],
            ['question' => 'Apakah melayani pembuatan mobile app?', 'answer' => 'Tentu, kami ahli dalam Flutter dan React Native.'],
            ['question' => 'Di mana lokasi kantor CodeNova?', 'answer' => 'Kami berbasis di Jakarta, namun melayani klien di seluruh Indonesia.'],
            ['question' => 'Bagaimana cara mulai project?', 'answer' => 'Klik tombol Mulai Project atau hubungi kami via WhatsApp.'],
            ['question' => 'Apakah dapat source code?', 'answer' => 'Ya, klien mendapatkan akses penuh ke source code setelah pelunasan.'],
            ['question' => 'Melayani SEO juga?', 'answer' => 'Ya, kami memiliki tim SEO spesialis.'],
            ['question' => 'Bisa integrasi Payment Gateway?', 'answer' => 'Tentu, kami mendukung Midtrans, Xendit, dan lainnya.'],
            ['question' => 'Ada garansi bug?', 'answer' => 'Kami memberikan garansi bug selama 3 bulan setelah project selesai.'],
            ['question' => 'Apakah bisa custom software?', 'answer' => 'Sangat bisa, kami spesialisasi di custom enterprise software.'],
        ];

        foreach ($faqs as $f) {
            $f['is_active'] = 1;
            $f['created_at'] = date('Y-m-d H:i:s');
            $db->table('faqs')->insert($f);
        }

        // 7. TESTIMONIALS (10 items)
        echo "Seeding testimonials...\n";
        $testimonials = [
            ['client_name' => 'Joko Susilo', 'client_company' => 'PT Maju Jaya', 'content' => 'Layanan sangat profesional dan tepat waktu.'],
            ['client_name' => 'Ani Wijaya', 'client_company' => 'Startup Hub', 'content' => 'Desain UI/UX nya luar biasa modern!'],
            ['client_name' => 'Rudi Hermawan', 'client_company' => 'Toko Kelontong', 'content' => 'E-Commerce saya jadi lebih ramai.'],
            ['client_name' => 'Siska Amelia', 'client_company' => 'Health Center', 'content' => 'Sistem dashboard nya sangat membantu manajemen.'],
            ['client_name' => 'Bambang', 'client_company' => 'Logistik Express', 'content' => 'Tracking system nya sangat akurat.'],
            ['client_name' => 'Indah Permata', 'client_company' => 'Tour & Travel', 'content' => 'Aplikasi mobile nya ringan dan user-friendly.'],
            ['client_name' => 'Doni', 'client_company' => 'Finance Solutions', 'content' => 'Cyber security audit nya sangat detail.'],
            ['client_name' => 'Yanti', 'client_company' => 'E-Learning Indo', 'content' => 'Platform belajar kami jadi lebih stabil.'],
            ['client_name' => 'Agus', 'client_company' => 'Property Agent', 'content' => 'Website property saya naik di halaman 1 Google.'],
            ['client_name' => 'Herman', 'client_company' => 'WorkForce', 'content' => 'Custom software nya sangat efisien.'],
        ];

        foreach ($testimonials as $t) {
            $t['client_photo'] = 'uploads/team/member.jpg';
            $t['is_active'] = 1;
            $t['rating'] = 5;
            $t['created_at'] = date('Y-m-d H:i:s');
            $db->table('testimonials')->insert($t);
        }

        // 8. PRODUCTS (10 items)
        echo "Seeding products...\n";
        $products = [
            ['name' => 'Sistem Informasi Sekolah', 'price' => 2500000, 'sku' => 'PRD-001'],
            ['name' => 'Script E-Commerce Laravel', 'price' => 1500000, 'sku' => 'PRD-002'],
            ['name' => 'Template Dashboard Premium', 'price' => 500000, 'sku' => 'PRD-003'],
            ['name' => 'Aplikasi Kasir (POS)', 'price' => 3000000, 'sku' => 'PRD-004'],
            ['name' => 'Sistem Booking Hotel', 'price' => 4500000, 'sku' => 'PRD-005'],
            ['name' => 'Sistem Inventory Gudang', 'price' => 3500000, 'sku' => 'PRD-006'],
            ['name' => 'Mobile App Coffee Shop', 'price' => 2000000, 'sku' => 'PRD-007'],
            ['name' => 'Sistem Antrian Online', 'price' => 1000000, 'sku' => 'PRD-008'],
            ['name' => 'Script Portal Berita', 'price' => 1200000, 'sku' => 'PRD-009'],
            ['name' => 'Aplikasi HR & Payroll', 'price' => 5000000, 'sku' => 'PRD-010'],
        ];

        foreach ($products as $p) {
            $p['thumbnail'] = 'uploads/products/product.jpg';
            $p['slug'] = url_title($p['name'], '-', true);
            $p['is_active'] = 1;
            $p['created_at'] = date('Y-m-d H:i:s');
            $p['description'] = 'Produk teknologi berkualitas tinggi dari CodeNova Indonesia.';
            echo "Inserting product: " . $p['name'] . "\n";
            $db->table('products')->insert($p);
        }

        echo "SuperSeeder finished successfully!\n";
    }
}
