<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugToTeamMembers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('team_members', [
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'after'      => 'name',
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('team_members', 'slug');
    }
}
