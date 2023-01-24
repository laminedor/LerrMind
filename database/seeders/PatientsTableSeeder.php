<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $patients = [
            [
                'nom' => 'Alex',
                'prenom' => 'Jones',
                'email' => 'alexjones@example.com',
                'password' => bcrypt('password')
            ],
            [
                'nom' => 'Wilson',
                'prenom' => 'Emma',
                'email' => 'emmawilson@example.com',
                'password' => bcrypt('password')
            ],
            [
                'nom' => 'Brown',
                'prenom' => 'Josh',
                'email' => 'joshbrown@example.com',
                'password' => bcrypt('password')
            ]
        ];
        DB::table('patients')->insert($patients);
    }
}
