<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaduanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT', // GANTI dari INT ke BIGINT
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'isi_laporan' => [
                'type' => 'TEXT',
            ],
            'tanggal_kejadian' => [
                'type' => 'DATE',
            ],
            'lokasi_kejadian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Menunggu Verifikasi', 'Diproses', 'Selesai'],
                'default'    => 'Menunggu Verifikasi',
            ],

            'admin_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => true,

            ],
            'tanggapan' => [
                'type' => 'TEXT',
                'null'       => true,

            ],
            'foto_tanggapan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'cascade', 'cascade');
        $this->forge->createTable('pengaduans');
    }

    public function down()
    {
        $this->forge->dropTable('pengaduans');
    }
}
