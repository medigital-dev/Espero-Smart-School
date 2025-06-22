<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0010 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('prestasi', [
            'bidang_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
                'null' => false,
            ],
            'tingkat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
        ]);
        $this->forge->dropColumn('prestasi', ['nama_kegiatan', 'tingkat_prestasi', 'hasil_dicapai']);

        // Tabel: ref_bidang_prestasi
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
        $this->forge->createTable('ref_bidang_prestasi', true);

        // Tabel: ref_tingkat_prestasi
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
        $this->forge->createTable('ref_tingkat_prestasi', true);
    }

    public function down()
    {
        $this->forge->dropColumn('prestasi', ['bidang_prestasi', 'nama', 'tingkat', 'hasil']);
        $this->forge->addColumn('prestasi', [
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tingkat_prestasi' => [
                'type' => 'ENUM',
                'constraint' => ['Kabupaten', 'Provinsi', 'Nasional', 'Internasional'],
            ],
            'hasil_dicapai' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
        ]);

        $this->forge->dropTable('ref_bidang_prestasi', true);
        $this->forge->dropTable('ref_tingkat_prestasi', true);
    }
}
