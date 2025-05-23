<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true, 'constraint' => 11],
            'nik'      => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'nama'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'alamat'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'telepon'  => ['type' => 'VARCHAR', 'constraint' => 15],
            'role'     => ['type' => 'ENUM', 'constraint' => ['user', 'admin'], 'default' => 'user'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
