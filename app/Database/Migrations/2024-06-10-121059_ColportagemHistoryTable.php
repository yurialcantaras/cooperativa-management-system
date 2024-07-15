<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ColportagemHistoryTable extends Migration{
    
    public function up(){

        $this->forge->addField(array(
            'id' => array(
                'type' => 'CHAR',
                'constraint' => 36,
                'null' => false,
            ),
            'colportor' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 'Sem nome',
            ),
            'book_qty' => array(
                'type' => 'INT',
                'null' => false,
                'default' => 0,
            ),
            'kit_qty' => array(
                'type' => 'INT',
                'null' => false,
                'default' => 0,
            ),
            'newpaper_qty' => array(
                'type' => 'INT',
                'null' => false,
                'default' => 0,
            ),
            'cash_amount' => array(
                'type' => 'FLOAT',
                'null' => false,
                'default' => 0.0,
            ),
            'card_amount' => array(
                'type' => 'FLOAT',
                'null' => false,
                'default' => 0.0,
            ),
            'transfer_amount' => array(
                'type' => 'FLOAT',
                'null' => false,
                'default' => 0.0,
            ),
    
        ));

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('colportagem_history');
    }

    public function down(){
        
        $this->forge->dropTable('colportagem_history');
    
    }
}
