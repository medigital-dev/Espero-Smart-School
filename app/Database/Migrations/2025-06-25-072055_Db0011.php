<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0011 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('rombongan_belajar', [
            'kurikulum_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('rombongan_belajar', 'kurikulum_id');
    }
}
