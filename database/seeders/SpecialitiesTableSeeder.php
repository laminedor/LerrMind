<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialites = [
            ['name' => 'Couple'],
            ['name' => 'Famille'],
            ['name' => 'Confiance'],
            ['name' => 'Stresse'],
            ['name' => 'Depression'],
            ['name' => 'Hypnose']
        ];
        DB::table('specialites')->insert($specialites);
    }
}
