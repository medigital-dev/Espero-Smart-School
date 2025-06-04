<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0007 extends Migration
{
    public function up()
    {
        // tabel beasiswa
        $this->forge->addColumn('beasiswa', [
            'jenis_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'tahun_awal' => [
                'type' => 'INT',
                'null' => false,
            ],
            'tahun_akhir' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'satuan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'uraian' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
                'null' => true,
                'default' => null,
            ]
        ]);
        $this->forge->dropColumn('beasiswa', ['tahun', 'nama']);

        // Tabel: ref_jenis_beasiswa
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
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_jenis_beasiswa', true);

        // Tabel: ref_satuan
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
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_satuan', true);
    }

    public function down()
    {
        $this->forge->dropColumn('beasiswa', ['jenis_id', 'tahun_awal', 'tahun_akhir', 'satuan_id', 'uraian']);
        $this->forge->addColumn('beasiswa', [
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
            ],
        ]);

        $this->forge->dropTable('ref_jenis_beasiswa', true);
        $this->forge->dropTable('ref_satuan', true);
    }
}
