<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0020 extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('guru_pegawai', ['jenis_kelamin', 'kewarganegaraan', 'golongan_darah', 'nama_ibu_kandung']);
        $this->forge->addColumn('guru_pegawai', [
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'ibu_kandung' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'nuptk' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
                'default' => null,
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
                'default' => null,
            ],
            'status_pegawai_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'jenis_gtk_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'sk_pengangkatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'tmt_pengangkatan' => [
                'type' => 'DATE',
            ],
            'tanggal_pengangkatan' => [
                'type' => 'DATE',
            ],
            'lembaga_pengangkatan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            ''
        ]);

        // Tabel: riwayat_pendidikan
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'riwayat_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'pendidikan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'tanggal_lulus' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'gelar_depan' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => true,
                'default' => null,
            ],
            'gelar_belakang' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('riwayat_pendidikan', true);
    }

    public function down()
    {
        $this->forge->dropColumn('guru_pegawai', ['jenis_kelamin', 'ibu_kandung']);
        $this->forge->addColumn('guru_pegawai', [
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'golongan_darah' => [
                'type' => 'ENUM',
                'constraint' => ['A', 'B', 'AB', 'O', '-'],
                'default' => '-',
            ],
            'kewarganegaraan' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'nama_ibu_kandung' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->dropTable('riwayat_pendidikan', true);
    }
}
