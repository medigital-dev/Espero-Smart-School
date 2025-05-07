<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0003 extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('kontak', [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('kontak', [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
            ],
        ]);
    }
}
