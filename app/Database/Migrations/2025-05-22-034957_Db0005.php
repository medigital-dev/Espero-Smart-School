<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0005 extends Migration
{
    public function up()
    {
        // edit referensi
        /**
         * ref jenis kelamin
         */

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
        ]);

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
    }

    public function down()
    {
        $this->forge->dropColumn('peserta_didik', ['nomor_akte', 'nomor_kk']);
        $this->forge->dropTable('ref_jenis_kelamin', true);
    }
}
