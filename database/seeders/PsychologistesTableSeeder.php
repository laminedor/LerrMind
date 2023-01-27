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
                'description' => "Je suis un psychologue spécialisé en couple. Je travaille avec les couples pour améliorer leur communication, résoudre les conflits et renforcer leur lien émotionnel. Je peux utiliser des techniques de thérapie de couple telles que la thérapie de la parole, la thérapie comportementale conjugale et la thérapie d'empathie pour aider les couples à atteindre leurs objectifs. Je peux également aider les couples à gérer des problèmes tels que la jalousie, l'infidélité et les différences de style de vie.",
                'specialite_id' => 1,
                'email' => 'lamine@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Gueye',
                'prenom' => 'Marietou',
                'description' => "En tant que psychologue spécialisé en famille, je travaille avec les membres d'une famille pour améliorer leur communication, résoudre les conflits et renforcer leurs liens émotionnels. Je peux utiliser des techniques telles que la thérapie familiale, la thérapie d'empathie et la thérapie comportementale pour aider les familles à atteindre leurs objectifs. Je peux également aider les familles à gérer des problèmes tels que la gestion de la colère, les conflits parent-enfant et les problèmes de communication.",
                'specialite_id' => 2,
                'email' => 'Marietou@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Fall',
                'prenom' => 'Abdou',
                'description' => "En tant que psychologue spécialisé en confiance en soi, je travaille avec les individus pour les aider à développer et à renforcer leur confiance en eux-mêmes. Je peux utiliser des techniques telles que la thérapie cognitivo-comportementale, l'hypnose et la thérapie d'empathie pour aider les individus à identifier et à changer les pensées et les comportements qui limitent leur confiance en eux-mêmes. Je peux également aider les individus à surmonter les expériences négatives passées qui ont affecté leur confiance en eux-mêmes et à apprendre des techniques pour gérer les situations stressantes qui peuvent affecter leur confiance en eux-mêmes.",
                'specialite_id' => 3,
                'email' => 'Abdou@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'nom' => 'Diattara',
                'prenom' => 'Awa',
                'description' => "En tant que psychologue spécialisé en gestion du stress, je travaille avec les individus pour les aider à identifier et à gérer les sources de stress dans leur vie. Je peux utiliser des techniques telles que la thérapie cognitivo-comportementale, la relaxation et la thérapie d'acceptation et d'engagement pour aider les individus à développer des stratégies pour gérer le stress de manière efficace. Je peux également aider les individus à comprendre les liens entre leur pensée, leurs émotions et leurs comportements, et à identifier les pensées automatiques négatives qui peuvent aggraver leur stress. Je peux également aider les individus à améliorer leur qualité de vie en leur enseignant des techniques de relaxation, de pleine conscience et de gestion du temps pour aider à gérer le stress.",
                'specialite_id' => 4,
                'email' => 'Awa@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Cellestin',
                'prenom' => 'David',
                'description' => "En tant que psychologue spécialisé en dépression, je travaille avec les individus pour les aider à comprendre et à gérer leurs symptômes de dépression. Je peux utiliser des techniques telles que la thérapie cognitivo-comportementale, la thérapie interpersonnelle et la thérapie d'acceptation et d'engagement pour aider les individus à identifier et à changer les pensées et les comportements qui contribuent à leur dépression. Je peux également aider les individus à comprendre les facteurs de risque de la dépression et à développer des stratégies pour gérer les situations stressantes qui peuvent aggraver leur état. Je peux également aider les individus à améliorer leur qualité de vie en leur enseignant des techniques de relaxation, de pleine conscience et de gestion du temps pour aider à gérer la dépression.",
                'specialite_id' => 5,
                'email' => 'David@example.com',
                'password' => bcrypt('password'),

            ],
            [
                'nom' => 'Diop',
                'prenom' => 'Issa Moussa',
                'description' => "En tant que psychologue spécialisé en hypnose, je travaille avec les individus pour les aider à utiliser l'hypnose comme une technique thérapeutique pour atteindre leurs objectifs. Je peux utiliser l'hypnose pour aider les individus à gérer des problèmes tels que les troubles anxieux, les addictions, les troubles de la douleur et les troubles de l'alimentation. Je peux également utiliser l'hypnose pour aider les individus à améliorer leur estime de soi, leur confiance en eux-mêmes et leur performance. Je peux également utiliser l'hypnose pour aider les individus à surmonter les traumatismes passés et les blocages émotionnels. Je suis formé pour utiliser l'hypnose en respectant les normes éthiques et les protocoles de sécurité pour garantir une expérience positive pour les clients.",
                'specialite_id' => 6,
                'email' => 'Soukey@example.com',
                'password' => bcrypt('password'),
            ]
            
        ];
        DB::table('psychologistes')->insert($psychologistes);
    }
}
