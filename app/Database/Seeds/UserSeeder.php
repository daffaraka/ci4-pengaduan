<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'nik' => $faker->nik,
                'nama' => $faker->name,
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => $faker->randomElement(['user', 'admin']),
             
            ];
        }

        $this->db->table('users')->insertBatch($data);
    }
}
