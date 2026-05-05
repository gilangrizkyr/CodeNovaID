<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeoRedirectsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'from_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'to_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['301', '302'],
                'default'    => '301',
            ],
            'hit_count' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('from_url');
        $this->forge->createTable('seo_redirects');
    }

    public function down()
    {
        $this->forge->dropTable('seo_redirects');
    }
}
