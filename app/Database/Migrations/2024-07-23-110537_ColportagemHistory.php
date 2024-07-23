<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ColportagemHistory extends Migration
{
    public function up()
    {
        $this->forge->addField(array(

            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => 36,
                'null' => false,
            ),

            'colportor' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 'Sem nome',
            ),

            'kits' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'default' => 0,
            ),
            
            'books' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'default' => 0,
            ),

            'newspapers' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
                'default' => 0,
            ),

            'cash_amount' => array(
                'type' => 'DECIMAL',
                'null' => true,
                'default' => 0,
            ),

            'card_amoun' => array(
                'type' => 'DECIMAL',
                'null' => true,
                'default' => 0,
            ),

            'transfer_amount' => array(
                'type' => 'DECIMAL',
                'null' => true,
                'default' => 0,
            ),
        
        ));

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('colportagem_history');
    }

    public function down()
    {
        $this->forge->dropTable('colportagem_history');
    }
}
