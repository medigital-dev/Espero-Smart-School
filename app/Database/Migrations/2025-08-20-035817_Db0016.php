<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0016 extends Migration
{
    public function up()
    {
        // Tabel: files
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'file_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'clientname' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'filename' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'extension' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => false,
            ],
            'path' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'size' => [
                'type' => 'INT'
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ]
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('files', true);

        // Tabel: logging
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'log_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'status' => [
                'type' => 'BOOLEAN',
                'null' => false,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'detail' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('logging', true);
    }

    public function down()
    {
        $this->forge->dropTable('files', true);
        $this->forge->dropTable('logging', true);
    }
}
