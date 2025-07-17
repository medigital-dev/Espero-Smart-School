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
    }
}
