<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        // Ambil semua user ID dari tabel users
        $users = $this->db->table('users')->select('id')->get()->getResultArray();
        $userIds = array_column($users, 'id'); // ambil hanya nilai ID-nya

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'user_id'         => $faker->randomElement($userIds),
                'judul'           => $faker->sentence(6),
                'kategori'        => $faker->randomElement(['Pencurian', 'Kekerasan', 'Kecelakaan', 'Pelanggaran']),
                'isi_laporan'     => $faker->paragraph(3),
                'tanggal_kejadian'=> $faker->date('Y-m-d', 'now'),
                'lokasi_kejadian' => $faker->address,
                'foto'            => null,
                'status'          => $faker->randomElement(['Menunggu Verifikasi', 'Diproses', 'Selesai']),
            ];

            $this->db->table('pengaduans')->insert($data);
        }
    }
}
