<?php

namespace App\Database\Migrations;

use App\Models\SemesterModel;
use CodeIgniter\Database\Migration;

class Db0014 extends Migration
{
    public function up()
    {
        $mSemester = new SemesterModel();
        $db = $this->db->table('rombongan_belajar');
        $data = $db->get()->getResultArray();
        $rows = [];
        foreach ($data as $row) {
            $cSemester = $mSemester->where('semester_id', $row['semester_id'])->first();
            if ($cSemester) {
                $row['semester_kode'] = $cSemester['kode'];
                unset($row['semester_id']);
                $rows[] = $row;
            }
        }
        $db->emptyTable();

        $this->forge->addColumn('rombongan_belajar', [
            'semester_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => false,
            ]
        ]);
        $this->forge->dropColumn('rombongan_belajar', 'semester_id');
        if (!empty($rows))
            $db->insertBatch($rows);
    }

    public function down()
    {
        $mSemester = new SemesterModel();
        $db = $this->db->table('rombongan_belajar');
        $data = $db->get()->getResultArray();
        $rows = [];
        foreach ($data as $row) {
            $cSemester = $mSemester->where('semester_kode', $row['semester_kode'])->first();
            $row['semester_kode'] = $cSemester['kode'];
            unset($row['semester_kode']);
            $rows[] = $row;
        }
        $db->emptyTable();

        $this->forge->addColumn('rombongan_belajar', [
            'semester_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
        $this->forge->dropColumn('rombongan_belajar', 'semester_kode');
        if (!empty($rows))
            $db->insertBatch($rows);
    }
}
