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
                'nom' => 'Gueye',
                'prenom' => 'Lamine',
                'description' => "En tant que psychologue spécialiste en stress,
                                    j'aide les personnes à gérer leur stress en 
                                    utilisant des techniques spécifiques. 
                                    Je travaille individuellement ou en groupe pour
                                    aider mes clients à gérer leur stress. ",
                'specialite_id' => 1,
                'email' => 'lamine@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Gueye',
                'prenom' => 'Marietou',
                'description' => "En tant que psychologue spécialiste en stress,
                                    j'aide les personnes à gérer leur stress en 
                                    utilisant des techniques spécifiques. 
                                    Je travaille individuellement ou en groupe pour
                                    aider mes clients à gérer leur stress. ",
                'specialite_id' => 2,
                'email' => 'Marietou@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Fall',
                'prenom' => 'Abdou',
                'description' => "En tant que psychologue spécialiste en stress,
                                    j'aide les personnes à gérer leur stress en 
                                    utilisant des techniques spécifiques. 
                                    Je travaille individuellement ou en groupe pour
                                    aider mes clients à gérer leur stress. ",
                'specialite_id' => 3,
                'email' => 'Abdou@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'nom' => 'Diattara',
                'prenom' => 'Awa',
                'description' => "En tant que psychologue spécialiste en stress,
                                    j'aide les personnes à gérer leur stress en 
                                    utilisant des techniques spécifiques. 
                                    Je travaille individuellement ou en groupe pour
                                    aider mes clients à gérer leur stress. ",
                'specialite_id' => 4,
                'email' => 'Awa@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Cellestin',
                'prenom' => 'David',
                'description' => "En tant que psychologue spécialiste en stress,
                                    j'aide les personnes à gérer leur stress en 
                                    utilisant des techniques spécifiques. 
                                    Je travaille individuellement ou en groupe pour
                                    aider mes clients à gérer leur stress. ",
                'specialite_id' => 5,
                'email' => 'David@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Seck',
                'prenom' => 'Soukey',
                'description' => "En tant que psychologue spécialiste en stress,
                                    j'aide les personnes à gérer leur stress en 
                                    utilisant des techniques spécifiques. 
                                    Je travaille individuellement ou en groupe pour
                                    aider mes clients à gérer leur stress. ",
                'specialite_id' => 6,
                'email' => 'Soukey@example.com',
                'password' => bcrypt('password'),
            ]
            
        ];
        DB::table('psychologistes')->insert($psychologistes);
    }
}
