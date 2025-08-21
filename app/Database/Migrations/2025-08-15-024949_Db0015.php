<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0015 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('prestasi', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => false,
                'unique' => true,
            ],
            'hasil_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'cabang' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => true,
            ],
            'foto_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'piagam_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('prestasi', ['hasil']);

        // Tabel: ref_hasil_prestasi
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
        $this->forge->createTable('ref_hasil_prestasi', true);

        helper('string');
        $date = date('Y-m-d H:i:s');
        $db = $this->db->table('ref_hasil_prestasi');
        $db->insertBatch([
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Juara 1',
                'kode' => 'J1',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Juara 2',
                'kode' => 'J2',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Juara 3',
                'kode' => 'J3',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Juara Harapan',
                'kode' => 'JH',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Peserta',
                'kode' => 'P',
            ],
        ]);

        $db = $this->db->table('ref_tingkat_prestasi');
        $db->insertBatch([
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Kabupaten',
                'kode' => 'kab',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Provinsi',
                'kode' => 'prov',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Nasional',
                'kode' => 'nas',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Internasional',
                'kode' => 'inter',
            ],
        ]);

        $db = $this->db->table('ref_bidang_prestasi');
        $db->insertBatch([
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Sains',
                'kode' => 'sains',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Bahasa dan Sastra',
                'kode' => 'bahasa',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Seni dan Budaya',
                'kode' => 'SB',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Olahraga',
                'kode' => 'OL',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Keagamaan',
                'kode' => 'AGAMA',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Keterampilan',
                'kode' => 'KT',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Sosial & Kemasyarakatan',
                'kode' => 'SK',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('prestasi', ['kode', 'hasil_id', 'cabang', 'foto_id', 'piagam_id']);
        $this->forge->addColumn('prestasi', [
            'hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
        ]);
        $this->forge->dropTable('ref_hasil_prestasi', true);
    }
}
