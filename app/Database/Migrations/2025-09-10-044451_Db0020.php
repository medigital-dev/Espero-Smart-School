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
        ]);
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
    }
}
