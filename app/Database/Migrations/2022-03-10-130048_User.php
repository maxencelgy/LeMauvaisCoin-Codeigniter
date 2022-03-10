<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 255,
                'auto_increment' => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '35',
                'null' => false
            ],
            'user_pw' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
