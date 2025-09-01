<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0018 extends Migration
{
    public function up()
    {
        // Tabel: flyer_duka
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
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('flyer_duka', true);

        // Tabel: flyer_info
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
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'konten' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('flyer_info', true);

        $this->forge->modifyColumn('flyer_prestasi', [
            'nik' => [
                'name' => 'NIK',
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => true,
                'default' => null,
            ]
        ]);

        $this->forge->addColumn('files', [
            'fullpath' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('flyer_duka', true);
        $this->forge->dropTable('flyer_info', true);
        $this->forge->modifyColumn('flyer_prestasi', [
            'nik' => [
                'name' => 'NIK',
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => false,
            ]
        ]);
        $this->forge->dropColumn('files', 'fullpath');
    }
}
