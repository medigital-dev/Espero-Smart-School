<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0006 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('alamat_tinggal', [
            'jenis_tinggal_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
        ]);

        // Tabel: ref_jenis_tinggal
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
        $this->forge->createTable('ref_jenis_tinggal', true);
    }

    public function down()
    {
        $this->forge->dropColumn('alamat_tinggal', ['jenis_tinggal_id']);
        $this->forge->dropTable('ref_jenis_tinggal', true);
    }
}
