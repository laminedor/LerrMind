<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsychologistesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $psychologistes = [
            [
                'nom' => 'Doe',
                'prenom' => 'John',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Smith',
                'prenom' => 'Jane',
                'email' => 'janesmith@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Johnson',
                'prenom' => 'Bob',
                'email' => 'bobjohnson@example.com',
                'password' => bcrypt('password'),
            ]
        ];
        DB::table('psychologistes')->insert($psychologistes);
    }
}
