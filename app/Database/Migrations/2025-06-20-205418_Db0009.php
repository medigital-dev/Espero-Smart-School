<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0009 extends Migration
{
    public function up()
    {
        helper('string');
        $this->forge->addColumn('kesejahteraan', [
            'tahun_awal' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'tahun_akhir' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
        ]);
        $db = $this->db->table('ref_jenis_kesejahteraan');
        $data = $db->get()->getResultArray();
        $db->emptyTable();
        $this->forge->addColumn('ref_jenis_kesejahteraan', [
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
                'unique' => true,
            ]
        ]);

        foreach ($data as $row) {
            $row['ref_id'] = uuid();
            $db->insert($row);
        }
    }

    public function down()
    {
        $this->forge->dropColumn('kesejahteraan', [
            'tahun_awal',
            'tahun_akhir'
        ]);
        $this->forge->dropColumn('ref_jenis_kesejahteraan', 'ref_id');
    }
}
