<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Annonces extends Migration
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
            'nom_annonce'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'description_annonce'       => [
                'type'       => 'TEXT',
                'constraint' => '200',
            ],
            'categorieId'          => [
                'type'           => 'INT',
            ],
            'prix_annonce'       => [
                'type'       => 'FLOAT',
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
        $this->forge->createTable('annonces');
    }

    public function down()
    {
        //
    }
}
