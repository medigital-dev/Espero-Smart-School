<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Db0015 extends Migration
{
    public function up()
    {
        // Tabel: map_orangtua_wali
        $this->forge->addField([
            'created_at' => ['type' => 'DATETIME',],
            'updated_at' => ['type' => 'DATETIME',],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true,],
            'id' => ['type' => 'INT', 'auto_increment' => true,],
            'map_id' => ['type' => 'VARCHAR', 'constraint' => 128, 'unique' => true,],

        ]);
        $this->forge->addKey('id', 'true');
        $this->forge->createTable('map_orangtua_wali', true);
    }

    public function down()
    {
        $this->forge->dropTable('map_orangtua_wali', true);
        //
    }
}
