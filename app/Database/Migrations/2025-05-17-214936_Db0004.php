<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0004 extends Migration
{
    public function up()
    {
        // Drop nomor ijazah lulus
        $this->forge->dropColumn('mutasi_pd', ['nomor_ijazah_lulus']);

        // Add tabel kelulusan
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'kelulusan_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'kurikulum' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'nomor_ijazah' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'penandatangan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('kelulusan', true);
    }

    public function down()
    {
        // Add nomor Ijazah lulus
        $this->forge->addColumn('mutasi_pd', [
            'nomor_ijazah_lulus' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
        ]);

        // Drop tabel kelulusan
        $this->forge->dropTable('kelulusan', true);
    }
}
