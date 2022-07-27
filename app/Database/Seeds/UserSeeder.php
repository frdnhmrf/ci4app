<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'name' => 'Ferdian Husnal Maruf',
                'alamat'    => 'jl. patimura',
                'pekerjaan' => 'ios developer',
                'kantor'    => 'sleman',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'name' => 'Ferdian',
                'alamat'    => 'jl. andara',
                'pekerjaan' => 'android developer',
                'kantor'    => 'semarang',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'name' => 'Husnal',
                'alamat'    => 'jl. goa',
                'pekerjaan' => 'react developer',
                'kantor'    => 'semarang',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'name' => 'Maruf',
                'alamat'    => 'jl. andara',
                'pekerjaan' => 'flutter developer',
                'kantor'    => 'demak',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (name, alamat, pekerjaan, kantor) VALUES(:name:, :alamat:, :pekerjaan:, :kantor:)', $data);

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
