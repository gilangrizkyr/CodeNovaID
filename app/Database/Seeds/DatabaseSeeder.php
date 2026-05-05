<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminUserSeeder');
        $this->call('SiteSettingSeeder');
        $this->call('ServiceSeeder');
        $this->call('PortfolioSeeder');
        $this->call('BlogCategorySeeder');
        $this->call('FaqSeeder');
        $this->call('TestimonialSeeder');
        $this->call('ClientSeeder');
        $this->call('TeamSeeder');
        $this->call('EmailTemplateSeeder');
    }
}
