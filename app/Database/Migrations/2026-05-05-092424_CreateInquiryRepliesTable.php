<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInquiryRepliesTable extends Migration
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
            'inquiry_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'admin_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'is_internal' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('inquiry_id', 'inquiries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('admin_id', 'admin_users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('inquiry_replies');
    }

    public function down()
    {
        $this->forge->dropTable('inquiry_replies');
    }
}
