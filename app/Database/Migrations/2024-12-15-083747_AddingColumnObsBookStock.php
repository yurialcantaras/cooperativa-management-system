<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddingColumnObsBookStock extends Migration
{
    public function up()
    {
        $fields = [
            'observations' => array(
                'type' => 'VARCHAR',
                'constraint' => 500, 
                'null' => true,      
                'default' => null,  
            ),
        ];

        $this->forge->addColumn('book_stock', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('book_stock', ['observations']);
    }
}
