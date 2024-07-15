<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Administrators extends Migration {
    public function up() {

        $this->forge->addField(array(
            'id' => array(
                'type' => 'CHAR',
                'constraint' => 36,
                'null' => false,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 'Sem nome',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 'Sem email',
                'unique' => true,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => '1234',
            ),
            'level' => array(
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => false,
                'default' => 9,
            ),
        ));
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('administrators');
    }

    public function down() {
        $this->forge->dropTable('administrators');
    }
}
