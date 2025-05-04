<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0003 extends Migration
{
    public function up()
    {
        // Tabel: log_activity
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'log_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],

        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('log_activity', true);
    }

    public function down()
    {
        $this->forge->dropTable('log_activity', true);
        //
    }
}
