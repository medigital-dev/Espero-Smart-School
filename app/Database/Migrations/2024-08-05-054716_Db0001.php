<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0001 extends Migration
{
    public function up()
    {
        helper('text');

        // tabel peserta didik
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'agama_id' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('peserta_didik', true);

        // tabel alamat
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'alamat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'alamat_jalan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'rt' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'rw' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'dusun' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => true,
                'default' => null,
            ],
            'lintang' => [
                'type' => 'double',
                'null' => true,
                'default' => null,
            ],
            'bujur' => [
                'type' => 'double',
                'null' => true,
                'default' => null,
            ],
            'jarak_rumah' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'waktu_tempuh' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'alat_transportasi_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alamat_tinggal', true);

        // tabel orangtua/wali
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'orangtua_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'kewarganegaraan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'default' => 'Indonesia',
            ],
            'agama_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'pekerjaan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'pendidikan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'penghasilan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orangtua_wali', true);

        // table orangtua_wali_pd
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'ortupd_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'orangtua_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'hubungan_keluarga' => [
                'type' => 'ENUM',
                'constraint' => ['kandung', 'angkat', 'wali'],
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orangtua_wali_pd', true);

        // tabel guru_pegawai
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'guru_pegawai_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'agama_id' => [
                'type' => 'VARCHAR',
                'constraint' => 64
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('guru_pegawai', true);

        // tabel referensi alat transportasi
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ref_alat_transportasi', true);
        $set = [
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Jalan Kaki', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Angkutan Umum/Bus/Pete-pete', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Mobil/Bus antar jemput', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Kereta Api', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Ojek', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Andong/bendi/sado/dokar/delman/becak', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Perahu penyeberangan/rakit/getek', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Kuda', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Sepeda', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Sepeda Motor', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Mobil Pribadi', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Lainnya', 'created_at' => date('Y-m-d H:i:s'), 'deleted_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('ref_alat_transportasi')->insertBatch($set);

        // tabel pekerjaan
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ref_pekerjaan', true);
        $set = [
            ['nama' => 'Tidak bekerja', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Nelayan', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Petani', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Peternak', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'PNS/TNI/Polri', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Karyawan Swasta', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Pedagang kecil', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Wiraswasta', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Wirausaha', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Buruh', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Pensiunan', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Tenaga Kerja Indonesia', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Karyawan BUMN', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Tidak dapat diterapkan', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Sudah Meninggal', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Lainnya', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Tidak bekerja', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('ref_pekerjaan')->insertBatch($set);

        // tabel pendidikan
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ref_pendidikan', true);
        $set = [
            ['nama' => 'D1', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'D2', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'D3', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'D4', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Informal', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Lainnya', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Non Formal', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Paket A', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Paket B', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Paket C', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'PAUD', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Profesi', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Putus SD', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'S1', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'S2', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'S2 Terapan', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'S3', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'S3 Terapan', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'TK / Sederajat', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'SD / Sederajat', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'SMP / Sederajat', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'SMA / Sederajat', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Sp-1', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Sp-2', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Tidak Sekolah', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('ref_pendidikan')->insertBatch($set);

        // tabel penghasilan
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ref_penghasilan', true);
        $set = [
            ['nama' => 'Kurang dari Rp. 500.000', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Rp. 500.000 - Rp. 999.999', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Rp. 1.00.000 - Rp. 1.999.999', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Rp. 2.000.000 - Rp. 4.999.999', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Rp. 5.000.000 - Rp. 20.000.000', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Lebih dari Rp. 20.000.000', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Tidak berpenghasilan', 'ref_id' => random_string('crypto', 16), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('ref_penghasilan')->insertBatch($set);

        // Tabel: sidebar_menu
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'menu_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'parent_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'default' => '#',
                'unique' => true,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'BOOLEAN',
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('sidebar_menu', true);

        // Tabel: dapodik_sync
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'dapodik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'port' => [
                'type' => 'INT'
            ],
            'npsn' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'status' => [
                'type' => 'BOOLEAN',
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('dapodik_sync', true);

        // Tabel: riwayat_test_koneksi
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'riwayat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'dapodik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal_waktu' => [
                'type' => 'DATETIME',
            ],
            'status' => [
                'type' => 'BOOLEAN'
            ],
            'pesan' => [
                'type' => 'TEXT',
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('riwayat_test_koneksi', true);

        // Tabel: satuan_pendidikan
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'sekolah_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'nss' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'npsn' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'bentuk_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'status_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'alamat_jalan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'rt' => ['type' => 'INT'],
            'rw' => ['type' => 'INT'],
            'dusun' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'desa_kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'kabupaten_kota' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'lintang' => [
                'type' => 'double',
            ],
            'bujur' => [
                'type' => 'double',
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'nomor_fax' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('satuan_pendidikan', true);

        // Tabel: registrasi_peserta_didik
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'registrasi_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'jenis_registrasi' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal_registrasi' => [
                'type' => 'DATE'
            ],
            'nipd' => [
                'type' => 'INT',
                'unique' => true,
            ],
            'asal_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'sekolah_jenjang_sebelumnya' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('registrasi_peserta_didik', true);

        // Tabel: ref_jenis_registrasi
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'ref_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_jenis_registrasi', true);
        $set = [
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Baru',
                'warna' => 'primary',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Pindahan',
                'warna' => 'warning',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Kembali Sekolah',
                'warna' => 'success',
            ],
        ];
        $this->db->table('ref_jenis_registrasi')->insertBatch($set);

        // Tabel: rombongan_belajar
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'rombel_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tingkat_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
            ],
            'semester_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'ptk_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('rombongan_belajar', true);

        // Tabel: anggota_rombongan_belajar
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'anggota_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'rombel_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'jenis_registrasi_rombel' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('anggota_rombongan_belajar', true);

        // Tabel: mutasi_pd
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'mutasi_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'alasan' => [
                'type' => 'TEXT'
            ],
            'sekolah_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'nomor_ijazah_lulus' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('mutasi_pd', true);

        // Tabel: semester
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'semester_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'status' => [
                'type' => 'BOOLEAN'
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('semester', true);

        // Tabel: riwayat_aplikasi
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'riwayat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'tipe' => [
                'type' => 'ENUM',
                'constraint' => ['info', 'error', 'success', 'warning'],
                'default' => 'info'
            ],
            'pesan' => [
                'type' => 'TEXT'
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('riwayat_aplikasi', true);

        // Tabel: kontak
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'kontak_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => true,
            ],
            'hp' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => true,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('kontak', true);

        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'kesejahteraan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'jenis_id' => [
                'type' => 'INT'
            ],
            'nomor_kartu' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
            ],
            'nama_kartu' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kesejahteraan', true);

        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ref_jenis_kesejahteraan', true);
        $set = [
            ['kode' => 'PIP', 'nama' => 'Program Indonesia Pintar', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['kode' => 'PKH', 'nama' => 'Program Keluarga Harapan', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['kode' => 'KPS', 'nama' => 'Kartu Perlindungan Sosial', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['kode' => 'KKS', 'nama' => 'Kartu Keluarga Sejahtera', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['kode' => 'KIS', 'nama' => 'Kartu Indonesia Sehat', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
        ];
        $this->db->table('ref_jenis_kesejahteraan')->insertBatch($set);

        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'catatan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'isi_catatan' => [
                'type' => 'LONGTEXT'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('catatan', true);

        // tabel prestasi PD
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'prestasi_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tingkat_prestasi' => [
                'type' => 'ENUM',
                'constraint' => ['Kabupaten', 'Provinsi', 'Nasional', 'Internasional'],
            ],
            'penyelenggara' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'hasil_dicapai' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('prestasi', true);

        // Beasiswa
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'beasiswa_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
            ],
            'nominal' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('beasiswa', true);

        // Data Periodik PD
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'periodik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tinggi_badan' => [
                'type' => 'INT',
                'null' => true,
            ],
            'berat_badan' => [
                'type' => 'INT',
                'null' => true,
            ],
            'lingkar_kepala' => [
                'type' => 'INT',
                'null' => true,
            ],
            'anak_ke' => [
                'type' => 'INT',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('periodik', true);

        // Riwayat Medis
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'riwayat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tahun_riwayat' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'nama_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penyakit', true);

        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ref_jenis_mutasi', true);
        $set = [
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Mutasi',
                'warna' => 'danger',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Dikeluarkan',
                'warna' => 'warning',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Menundurkan Diri',
                'warna' => 'info',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Putus Sekolah',
                'warna' => 'warning',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Wafat',
                'warna' => 'secondary',
            ],
            [
                'ref_id' => random_string('crypto', 16),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nama' => 'Hilang',
                'warna' => 'secondary',
            ],
        ];
        $this->db->table('ref_jenis_mutasi')->insertBatch($set);

        // Tabel: kebutuhan_khusus
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'kebutuhan_khusus_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'ref_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'tanggal_akhir' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('kebutuhan_khusus', true);

        // Tabel: ref_kebutuhan_khusus
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'ref_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_kebutuhan_khusus', true);
        $set = [
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Netra', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Rungu', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Grahita Ringan', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Grahita Sedang', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Daksa Ringan', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Daksa Sedang', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Laras', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Wicara', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Hyperaktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Cerdas Istimewa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Bakat Istimewa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Kesulitan Belajar', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Narkoba', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Indigo', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Down Syndrome', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Autis', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('ref_kebutuhan_khusus')->insertBatch($set);

        // Tabel: ref_agama
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'ref_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_agama', true);
        $set = [
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Islam', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Katolik', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Kristen', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Hindu', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Budha', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Konghucu', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['ref_id' => random_string('crypto', 16), 'nama' => 'Kepercayaan', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('ref_agama')->insertBatch($set);
    }

    public function down()
    {
        $this->forge->dropTable('peserta_didik', true);
        $this->forge->dropTable('guru_pegawai', true);
        $this->forge->dropTable('orangtua_wali', true);
        $this->forge->dropTable('orangtua_wali_pd', true);
        $this->forge->dropTable('alamat_tinggal', true);
        $this->forge->dropTable('alamat_peserta_didik', true);
        $this->forge->dropTable('alamat_guru_pegawai', true);
        $this->forge->dropTable('alamat_orangtua', true);
        $this->forge->dropTable('alat_transportasi', true);
        $this->forge->dropTable('sidebar_menu', true);
        $this->forge->dropTable('dapodik_sync', true);
        $this->forge->dropTable('riwayat_test_koneksi', true);
        $this->forge->dropTable('rombongan_belajar', true);
        $this->forge->dropTable('anggota_rombongan_belajar', true);
        $this->forge->dropTable('registrasi_peserta_didik', true);
        $this->forge->dropTable('satuan_pendidikan', true);
        $this->forge->dropTable('mutasi_pd', true);
        $this->forge->dropTable('semester', true);
        $this->forge->dropTable('riwayat_aplikasi', true);
        $this->forge->dropTable('kontak', true);
        $this->forge->dropTable('kesejahteraan', true);
        $this->forge->dropTable('catatan', true);
        $this->forge->dropTable('prestasi', true);
        $this->forge->dropTable('beasiswa', true);
        $this->forge->dropTable('periodik', true);
        $this->forge->dropTable('penyakit', true);
        $this->forge->dropTable('kebutuhan_khusus', true);
        $this->forge->dropTable('ref_jenis_kesejahteraan', true);
        $this->forge->dropTable('ref_pekerjaan', true);
        $this->forge->dropTable('ref_pendidikan', true);
        $this->forge->dropTable('ref_penghasilan', true);
        $this->forge->dropTable('ref_jenis_mutasi', true);
        $this->forge->dropTable('ref_kebutuhan_khusus', true);
        $this->forge->dropTable('ref_agama', true);
        $this->forge->dropTable('ref_alat_transportasi', true);
    }
}
