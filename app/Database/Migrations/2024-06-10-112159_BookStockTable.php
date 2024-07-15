<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookStockTable extends Migration{

    public function up(){

        $this->forge->addField(array(

            'id' => array(
                'type' => 'CHAR',
                'constraint' => 36,
                'null' => false,
            ),

            'book_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'default' => 'Sem nome',
            ),

            'quantity' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
                'default' => 0,
            ),
        
        ));
        $this->forge->addField('arrived_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->forge->addField('purchase_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('book_stock');

    }

    public function down(){

        $this->forge->dropTable('book_stock');

    }

}