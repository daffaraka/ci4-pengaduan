<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $this->db->table('users')->insert([
            'nik' => '1234567890123456',
            'email' => 'admin@admin.com',
            'nama' => 'Admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'alamat' => 'Jl. Administrasi 1',
            'telepon' => '081234567890',
            'role' => 'admin'
        ]);
        $data = [];
        for ($i = 1; $i < 10; $i++) {
            $data[] = [
                'nik' => $faker->nik,
                'email' => $faker->email,
                'nama' => $faker->name,
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'role' => $faker->randomElement(['user', 'admin']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('users')->insertBatch($data);
    }
}
