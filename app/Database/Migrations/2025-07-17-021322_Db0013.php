<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0013 extends Migration
{
    public function up()
    {
        // Tabel: sekolah_sebelumnya
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'sekolah_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'nomor_skhun' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'nomor_ijazah' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'nomor_ujian' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('sekolah_sebelumnya', true);

        $this->forge->addColumn('peserta_didik', [
            'jumlah_saudara' => [
                'type' => 'INT',
                'null' => true,
                'default' => null
            ]
        ]);

        $this->forge->modifyColumn('registrasi_peserta_didik', [
            'sekolah_jenjang_sebelumnya' => [
                'name' => 'sekolah_sebelumnya_id',
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ]
        ]);

        // Tabel: pip
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'pip_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'nominal' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'no_rekening' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'tahap_id' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'nomor_sk' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'tanggal_sk' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'nama_rekening' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'nama_bank' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'virtual_acc' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'semester_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'tanggal_cair' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'status_cair' => [
                'type' => 'BOOLEAN',
                'null' => true,
                'default' => null,
            ],
            'tahap_keterangan' => [
                'type' => 'TEXT',
                'null' => true,
                'default' => null,
            ],
            'pengusul' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('pip', true);

        // Tabel: layak_pip
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'layak_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'status' => [
                'type' => 'BOOLEAN'
            ],
            'alasan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('layak_pip', true);

        // Tabel: ref_alasan_pip
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
        $this->forge->createTable('ref_alasan_pip', true);

        $this->forge->modifyColumn('peserta_didik', [
            'jenis_kelamin' => [
                'name' => 'jenis_kelamin',
                'type' => 'VARCHAR',
                'constraint' => 128,
            ]
        ]);

        $this->forge->modifyColumn('orangtua_wali', [
            'jenis_kelamin' => [
                'name' => 'jenis_kelamin',
                'type' => 'VARCHAR',
                'constraint' => 128,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('sekolah_sebelumnya', true);
        $this->forge->dropColumn('peserta_didik', 'jumlah_saudara');
        $this->forge->modifyColumn('registrasi_peserta_didik', [
            'sekolah_sebelumnya_id' => [
                'name' => 'sekolah_jenjang_sebelumnya',
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->dropTable('pip', true);
        $this->forge->dropTable('layak_pip', true);
        $this->forge->dropTable('ref_alasan_pip', true);
        $this->forge->modifyColumn('peserta_didik', [
            'jenis_kelamin' => [
                'name' => 'jenis_kelamin',
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ]
        ]);
        $this->forge->modifyColumn('orangtua_wali', [
            'jenis_kelamin' => [
                'name' => 'jenis_kelamin',
                'type' => 'VARCHAR',
                'constraint' => 8,
            ]
        ]);
    }
}
