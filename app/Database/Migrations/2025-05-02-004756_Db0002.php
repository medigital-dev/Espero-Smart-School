<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0002 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('orangtua_wali_pd', [
            'ayah_id' => [
                'type' => 'varchar',
                'constraint' => 128,
                'null' => true,
            ],
            'ibu_id' => [
                'type' => 'varchar',
                'constraint' => 128,
                'null' => false,
            ],
            'wali_id' => [
                'type' => 'varchar',
                'constraint' => 128,
                'null' => true,
            ],
        ]);

        $this->forge->dropColumn('orangtua_wali_pd', ['hubungan_keluarga', 'orangtua_id']);
    }

    public function down()
    {
        $this->forge->dropColumn('orangtua_wali_pd', ['ayah_id', 'ibu_id', 'wali_id']);
        $this->forge->addColumn('orangtua_wali_pd', [
            'hubungan_keluarga' => [
                'type' => 'ENUM',
                'constraint' => ['kandung', 'angkat', 'wali'],
                'null' => true,
                'default' => null,
            ],
            'orangtua_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
    }
}
