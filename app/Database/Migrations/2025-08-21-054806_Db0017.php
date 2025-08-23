<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0017 extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('prestasi', ['foto_id']);
        // Tabel: flyer_prestasi
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'flyer_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
                'unique' => true,
            ],
            'foto_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'content' => [
                'type' => 'TEXT',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('flyer_prestasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('flyer_prestasi', true);
        $this->forge->addColumn('prestasi', [
            'foto_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
        ]);
    }
}
