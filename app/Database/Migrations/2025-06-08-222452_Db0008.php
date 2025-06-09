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
                'nama' => 'Info',
                'kode' => 'bg-info'
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
                'nama' => 'Light',
                'kode' => 'bg-light'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Indigo',
                'kode' => 'bg-indigo'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Navy',
                'kode' => 'bg-navy'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Purple',
                'kode' => 'bg-purple'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Fuchsia',
                'kode' => 'bg-fuchsia'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Pink',
                'kode' => 'bg-pink'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Maroon',
                'kode' => 'bg-maroon'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Orange',
                'kode' => 'bg-orange'
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
                'nama' => 'Light Gray',
                'kode' => 'bg-gray-light'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Green',
                'kode' => 'bg-green'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Light Blue',
                'kode' => 'bg-lightblue'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Red',
                'kode' => 'bg-red'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Transparent',
                'kode' => 'bg-transparent'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'White',
                'kode' => 'bg-white'
            ],
            [
                'ref_id' => uuid(),
                'nama' => 'Yellow',
                'kode' => 'bg-yellow'
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
    }

    public function down()
    {
        //
        $this->forge->dropTable('ref_kurikulum', true);
        $this->forge->dropTable('ref_background_color', true);
        $this->forge->dropTable('ref_text_color', true);
    }
}
