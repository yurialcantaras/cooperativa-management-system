<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class ChangeHistoryTable extends Migration{

    public function up(){

        $this->forge->addField(array(

            'id' => [
                'type' => 'CHAR',
                'constraint' => '36',
                'null' => false,
            ],
            'user_id' => [
                'type' => 'CHAR',
                'constraint' => 36,
                'null' => false,
            ],
            'table' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 'Sem tabela',
            ],

        ));
        $this->forge->addField('updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->forge->addField('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('change_history');
    }

    public function down(){

        $this->forge->dropTable('change_history');

    }
}
