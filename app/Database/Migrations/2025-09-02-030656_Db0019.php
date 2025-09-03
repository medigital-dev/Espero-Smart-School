<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0019 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('semester', [
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
        $this->forge->addColumn('anggota_rombongan_belajar', [
            'semester_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => false
            ]
        ]);
        $this->forge->dropColumn('rombongan_belajar', 'semester_kode');
        $this->forge->addColumn('rombongan_belajar', [
            'status' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('semester', 'nama');
        $this->forge->dropColumn('anggota_rombongan_belajar', 'semester_kode');
        $this->forge->addColumn('rombongan_belajar', [
            'semester_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => false
            ]
        ]);
        $this->forge->dropColumn('rombongan_belajar', 'status');
    }
}
