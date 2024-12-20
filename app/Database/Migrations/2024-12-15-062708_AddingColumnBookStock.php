<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddingColumnBookStock extends Migration
{
    public function up()
    {
        $fields = [
            'book_type' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'null'       => false,
                'default'    => '00',
                'after'      => 'quantity',
            ],
        ];

        $this->forge->addField('arrived_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->forge->addColumn('book_stock', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('book_stock', ['book_type']);
    }
}
