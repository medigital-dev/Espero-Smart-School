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

        $this->forge->addColumn('orangtua_wali_pd', [
            'hubungan_keluarga_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'anak_ke' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
        ]);

        // Tabel: ref_hubungan_keluarga
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'ref_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_hubungan_keluarga', true);
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
        $this->forge->dropColumn('orangtua_wali_pd', ['hubungan_keluarga_id', 'anak_ke']);
        $this->forge->dropTable('ref_hubungan_keluarga', true);
    }
}
