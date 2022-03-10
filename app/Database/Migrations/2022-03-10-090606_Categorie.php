<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorie extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom_cat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'createdAt' => [
                'type' => 'DATETIME',
            ],
            'modifiedAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categorie');
    }

    public function down()
    {
        //
    }
}
