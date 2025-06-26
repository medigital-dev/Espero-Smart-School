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

        $this->forge->dropColumn('periodik', 'anak_ke');

        // Tabel: mapp_orangtua_wali
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'mapp_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'ortuwali_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'hubungan_keluarga_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'anak_ke' => [
                'type' => 'VARCHAR'
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('mapp_orangtua_wali', true);
    }

    public function down()
    {
        $this->forge->dropColumn('rombongan_belajar', 'kurikulum_id');
        $this->forge->addColumn('periodik', [
            'anak_ke' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->dropTable('mapp_orangtua_wali', true);
    }
}
