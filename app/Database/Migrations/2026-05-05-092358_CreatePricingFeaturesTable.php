<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePricingFeaturesTable extends Migration
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
            'package_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'feature' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_included' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'note' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('package_id', 'pricing_packages', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pricing_features');
    }

    public function down()
    {
        $this->forge->dropTable('pricing_features');
    }
}
