<?php

namespace Database\Seeders;

use App\Models\Psycologue;
use App\Models\Specialite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsychologistesSpecialitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupération des ids des psychologues et des spécialités
        $psychologiste_ids = Psycologue::pluck('id')->toArray();
        $specialite_ids = Specialite::pluck('id')->toArray();

        // Boucle pour créer des entrées aléatoires
        for ($i=0; $i < 2; $i++) { 
            DB::table('psychologistes_specialites')->insert([
                'psychologiste_id' => $psychologiste_ids[array_rand($psychologiste_ids)],
                'specialite_id' => $specialite_ids[array_rand($specialite_ids)],
            ]);
        }
    }
}
