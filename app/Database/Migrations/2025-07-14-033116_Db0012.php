<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0012 extends Migration
{
    public function up()
    {
        helper('string');

        $this->forge->addColumn('peserta_didik', [
            'anak_ke' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('orangtua_wali_pd', ['anak_ke', 'hubungan_keluarga_id']);
        $this->forge->dropColumn('kebutuhan_khusus', ['tanggal_mulai', 'tanggal_akhir']);

        $db = $this->db->table('ref_kebutuhan_khusus');
        $db->emptyTable();
        $date = date('Y-m-d H:i:s');
        $db->insertBatch([
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Netra',
                'kode' => 'A',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Rungu',
                'kode' => 'B',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Grahita Ringan',
                'kode' => 'C',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Grahita Sedang',
                'kode' => 'C1',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Daksa Ringan',
                'kode' => 'D',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Daksa Sedang',
                'kode' => 'D1',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Laras',
                'kode' => 'E',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Wicara',
                'kode' => 'F',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Hyperaktif',
                'kode' => 'H',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Cerdas Istimewa',
                'kode' => 'I',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Bakat Istimewa',
                'kode' => 'J',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Kesulitan Belajar',
                'kode' => 'K',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Narkoba',
                'kode' => 'N',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Indigo',
                'kode' => 'O',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Down Syndrome',
                'kode' => 'P',
            ],
            [
                'created_at' => $date,
                'updated_at' => $date,
                'ref_id' => uuid(),
                'nama' => 'Autis',
                'kode' => 'Q',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('peserta_didik', ['anak_ke']);
        $this->forge->addColumn('orangtua_wali_pd', [
            'anak_ke' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'hubungan_keluarga_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->addColumn('kebutuhan_khusus', [
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'tanggal_akhir' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
        ]);
        $db = $this->db->table('ref_kebutuhan_khusus');
        $db->emptyTable();
    }
}
