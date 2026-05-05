<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePopupsTable extends Migration
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
                'constraint' => '200',
                'null'       => true,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'button_text' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'button_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'trigger_type' => [
                'type'       => 'ENUM',
                'constraint' => ['time', 'scroll', 'exit'],
                'default'    => 'time',
            ],
            'trigger_value' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 5,
            ],
            'show_once' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'cookie_days' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 7,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'start_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'end_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('popups');
    }

    public function down()
    {
        $this->forge->dropTable('popups');
    }
}
