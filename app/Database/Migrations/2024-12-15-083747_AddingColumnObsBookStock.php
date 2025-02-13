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

        $this->forge->addColumn('literature_stock', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('literature_stock', ['observations']);
    }
}
