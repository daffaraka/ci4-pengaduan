<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTanggapanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT', // GANTI dari INT ke BIGINT
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'admin_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11
            ],
            'tanggapan' => [
                'type' => 'TEXT',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            // 'status' => [
            //     'type'       => 'ENUM',
            //     'constraint' => ['Menunggu Verifikasi', 'Diproses', 'Selesai'],
            //     'default'    => 'Menunggu Verifikasi',
            // ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('admin_id', 'users', 'id', 'cascade', 'cascade');
        $this->forge->createTable('tanggapans');
    }

    public function down()
    {
        $this->forge->dropTable('pengaduans');
    }
}
