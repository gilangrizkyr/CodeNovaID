<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicesTable extends Migration
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
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'icon_svg' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'icon_class' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'short_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'full_description' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'banner_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'price_start' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,0',
                'default'    => 0,
            ],
            'price_end' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,0',
                'default'    => 0,
            ],
            'price_label' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'Mulai dari',
            ],
            'process_steps' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'faq_ids' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'is_featured' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'views' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'meta_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '160',
                'null'       => true,
            ],
            'meta_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '320',
                'null'       => true,
            ],
            'og_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->addKey(['is_active', 'sort_order']);
        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services');
    }
}
