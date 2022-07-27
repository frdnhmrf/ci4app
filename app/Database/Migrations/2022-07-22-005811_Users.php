<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
// when installed via composer
require_once 'vendor/autoload.php';
require_once '/vendor/fakerphp/Faker/src/autoload.php';


class Users extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '225'
            ],
            'pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' =>  '255',
            ],
            'kantor' => [
                'type'       => 'VARCHAR',
                'constraint' =>  '255',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
