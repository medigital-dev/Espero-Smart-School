<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0008 extends Migration
{
    public function up()
    {
        helper('string');
        // Tabel: ref_kurikulum
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
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_kurikulum', true);

        // Tabel: ref_background_color
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
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_background_color', true);
        $db = $this->db->table('ref_background_color');
        $db->insertBatch([
            [
                'ref_id' => uuid(),
                'nama' => 'Primary',
                'kode' => 'bg-primary'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Secondary',
                'kode' => 'bg-secondary'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Success',
                'kode' => 'bg-success'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Danger',
                'kode' => 'bg-danger'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Warning',
                'kode' => 'bg-warning'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Info',
                'kode' => 'bg-info'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Black',
                'kode' => 'bg-black'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Dark Gray',
                'kode' => 'bg-gray-dark'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Gray',
                'kode' => 'bg-gray'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Light Gray',
                'kode' => 'bg-gray-light'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Light',
                'kode' => 'bg-light'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Red',
                'kode' => 'bg-red'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Maroon',
                'kode' => 'bg-maroon'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Pink',
                'kode' => 'bg-pink'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Fuchsia',
                'kode' => 'bg-fuchsia'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Indigo',
                'kode' => 'bg-indigo'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Purple',
                'kode' => 'bg-purple'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Navy',
                'kode' => 'bg-navy'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Blue',
                'kode' => 'bg-blue'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Cyan',
                'kode' => 'bg-cyan'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Yellow',
                'kode' => 'bg-yellow'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Orange',
                'kode' => 'bg-orange'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Green',
                'kode' => 'bg-green'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Lime',
                'kode' => 'bg-lime'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Teal',
                'kode' => 'bg-teal'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Olive',
                'kode' => 'bg-olive'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'White',
                'kode' => 'bg-white'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Transparent',
                'kode' => 'bg-transparent'
            ],
        ]);

        // Tabel: ref_text_color
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
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('ref_text_color', true);
        $db = $this->db->table('ref_text_color');
        $db->insertBatch([
            [
                'ref_id' => uuid(),
                'nama' => 'Primary',
                'kode' => 'text-primary'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Secondary',
                'kode' => 'text-secondary'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Success',
                'kode' => 'text-success'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Danger',
                'kode' => 'text-danger'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Warning',
                'kode' => 'text-warning'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Info',
                'kode' => 'text-info'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Dark',
                'kode' => 'text-dark'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Black',
                'kode' => 'text-black'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Black 50%',
                'kode' => 'text-black-50'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Dark Gray',
                'kode' => 'text-gray-dark'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Gray',
                'kode' => 'text-gray'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Muted',
                'kode' => 'text-muted'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Light',
                'kode' => 'text-light'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Red',
                'kode' => 'text-red'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Maroon',
                'kode' => 'text-maroon'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Pink',
                'kode' => 'text-pink'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Fuchsia',
                'kode' => 'text-fuchsia'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Indigo',
                'kode' => 'text-indigo'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Purple',
                'kode' => 'text-purple'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Navy',
                'kode' => 'text-navy'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Blue',
                'kode' => 'text-blue'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Light Blue',
                'kode' => 'text-lightblue'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Cyan',
                'kode' => 'text-cyan'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Yellow',
                'kode' => 'text-yellow'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Orange',
                'kode' => 'text-orange'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Green',
                'kode' => 'text-green'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Lime',
                'kode' => 'text-lime'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Teal',
                'kode' => 'text-teal'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Olive',
                'kode' => 'text-olive'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'White',
                'kode' => 'text-white'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'White 50%',
                'kode' => 'text-white-50'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Text Body',
                'kode' => 'text-body'
            ],
        ]);

        // Modifikasi
        $this->forge->addColumn('ref_agama', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_agama', 'warna');
        $this->forge->addColumn('ref_alat_transportasi', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_alat_transportasi', 'warna');
        $this->forge->addColumn('ref_jenis_beasiswa', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_beasiswa', 'warna');
        $this->forge->addColumn('ref_jenis_kelamin', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_kelamin', 'warna');
        $this->forge->addColumn('ref_jenis_kesejahteraan', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_kesejahteraan', 'warna');
        $this->forge->addColumn('ref_jenis_mutasi', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_mutasi', 'warna');
        $this->forge->addColumn('ref_jenis_registrasi', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_registrasi', 'warna');
        $this->forge->addColumn('ref_jenis_tinggal', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_tinggal', 'warna');
        $this->forge->addColumn('ref_kebutuhan_khusus', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_kebutuhan_khusus', 'warna');
        $this->forge->addColumn('ref_pekerjaan', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_pekerjaan', 'warna');
        $this->forge->addColumn('ref_pendidikan', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_pendidikan', 'warna');
        $this->forge->addColumn('ref_penghasilan', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_penghasilan', 'warna');
        $this->forge->addColumn('ref_satuan', [
            'bg_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_satuan', 'warna');
    }

    public function down()
    {
        //
        $this->forge->dropTable('ref_kurikulum', true);
        $this->forge->dropTable('ref_background_color', true);
        $this->forge->dropTable('ref_text_color', true);

        $this->forge->addColumn('ref_agama', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_agama', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_alat_transportasi', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_alat_transportasi', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_jenis_beasiswa', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_beasiswa', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_jenis_kelamin', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_kelamin', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_jenis_kesejahteraan', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_kesejahteraan', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_jenis_mutasi', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_mutasi', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_jenis_registrasi', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_registrasi', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_jenis_tinggal', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_jenis_tinggal', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_kebutuhan_khusus', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_kebutuhan_khusus', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_pekerjaan', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_pekerjaan', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_pendidikan', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_pendidikan', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_penghasilan', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_penghasilan', ['bg_color', 'text_color']);
        $this->forge->addColumn('ref_satuan', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->dropColumn('ref_satuan', ['bg_color', 'text_color']);
    }
}
