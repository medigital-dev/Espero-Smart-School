<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0005 extends Migration
{
    public function up()
    {
        helper('string');

        $this->forge->addColumn('peserta_didik', [
            'nomor_akte' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'nomor_kk' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'foto_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ]
        ]);

        // Tabel: pass_foto
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'foto_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'filename' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false,
            ],
            'path' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('pass_foto', true);

        // Tabel: ref_jenis_kelamin
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
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_jenis_kelamin', true);
        $db = $this->db->table('ref_jenis_kelamin');
        $db->insertBatch([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
                'ref_id' => uuid(),
                'nama' => 'Laki-laki',
                'kode' => 'L',
                'warna' => 'bg-primary',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
                'ref_id' => uuid(),
                'nama' => 'Perempuan',
                'kode' => 'P',
                'warna' => 'bg-danger',
            ],
        ]);

        $this->forge->addColumn('ref_agama', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addColumn('ref_alat_transportasi', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addColumn('ref_jenis_kesejahteraan', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addColumn('ref_jenis_mutasi', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
        ]);

        $this->forge->addColumn('ref_jenis_registrasi', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
        ]);

        $this->forge->addColumn('ref_kebutuhan_khusus', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addColumn('ref_pekerjaan', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addColumn('ref_pendidikan', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addColumn('ref_penghasilan', [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'unique' => true,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('peserta_didik', ['nomor_akte', 'nomor_kk', 'foto_id']);
        $this->forge->dropTable('ref_jenis_kelamin', true);
        $this->forge->dropTable('pass_foto', true);
        $this->forge->dropColumn('ref_agama', ['kode', 'warna']);
        $this->forge->dropColumn('ref_alat_transportasi', ['kode', 'warna']);
        $this->forge->dropColumn('ref_jenis_kesejahteraan', ['warna']);
        $this->forge->dropColumn('ref_jenis_mutasi', ['kode']);
        $this->forge->dropColumn('ref_jenis_registrasi', ['kode']);
        $this->forge->dropColumn('ref_kebutuhan_khusus', ['kode', 'warna']);
        $this->forge->dropColumn('ref_pekerjaan', ['kode', 'warna']);
        $this->forge->dropColumn('ref_pendidikan', ['kode', 'warna']);
        $this->forge->dropColumn('ref_penghasilan', ['kode', 'warna']);
    }
}
