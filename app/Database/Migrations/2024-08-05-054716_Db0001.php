<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0001 extends Migration
{
    public function up()
    {
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
            'agama' => [
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
            'ayah_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'ibu_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'wali_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
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
            ]
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
            'agama' => [
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

        // tabel alamat peserta didik
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
            'alamat_pd_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'alamat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'status' => [
                'type' => 'BOOLEAN'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alamat_peserta_didik', true);

        // tabel alamat orangtua
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
            'alamat_orangtua_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'orangtua_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'alamat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'status' => [
                'type' => 'BOOLEAN'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alamat_orangtua', true);

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
            'agama' => [
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

        // tabel alamat guru_pegawai
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
            'alamat_guru_pegawai_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'unique' => true,
            ],
            'guru_pegawai_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'alamat_id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'status' => [
                'type' => 'BOOLEAN'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alamat_guru_pegawai', true);

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
            'alat_transportasi_id' => [
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
        $this->forge->createTable('alat_transportasi', true);

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
            'pekerjaan_id' => [
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
        $this->forge->createTable('pekerjaan', true);

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
            'pendidikan_id' => [
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
        $this->forge->createTable('pendidikan', true);

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
            'penghasilan_id' => [
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
        $this->forge->createTable('penghasilan', true);
    }

    public function down()
    {
        $this->forge->dropTable('peserta_didik', true);
        $this->forge->dropTable('guru_pegawai', true);
        $this->forge->dropTable('orangtua_wali', true);
        $this->forge->dropTable('alamat_tinggal', true);
        $this->forge->dropTable('alamat_peserta_didik', true);
        $this->forge->dropTable('alamat_guru_pegawai', true);
        $this->forge->dropTable('alamat_orangtua', true);
        $this->forge->dropTable('alat_transportasi', true);
        $this->forge->dropTable('pekerjaan', true);
        $this->forge->dropTable('pendidikan', true);
        $this->forge->dropTable('penghasilan', true);
    }
}
