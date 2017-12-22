<?php

use Illuminate\Database\Seeder;
use App\JobCategory;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Informatique de gestion
        $names = ['Programmation', 'Programmation Web', 'Programmation Mobile', 'Développement de jeux vidéo', 'Scripting', 'Machine Learning',
                    'Programmation BackEnd', 'Bases de données'];

        foreach($names as $name){
            JobCategory::create([
                'program_id' => '2',
                'name' => $name
            ]);
        }

        // Gestion des reseaux
        $names = ['Réseaux', 'Gestion des réseaux', 'Administrateur des réseaux'];
        foreach($names as $name){
            JobCategory::create([
                'program_id' => '3',
                'name' => $name
            ]);
        }

        // Telecommunications
        $names = ['Télécommunications'];
        foreach($names as $name){
            JobCategory::create([
                'program_id' => '4',
                'name' => $name
            ]);
        }

        // Soutien
        $names = ['Soutien informatique', 'Support au client', 'Dépannage', 'Installation d\'équipement', 'Migration de OS', 'Administrateur du système'];
        foreach($names as $name){
            JobCategory::create([
                'program_id' => '5',
                'name' => $name
            ]);
        }

        // Electronique industrielle
        JobCategory::create([
            'program_id' => '6',
            'name' => 'Éléctronique industrielle'
        ]);

        // Instrumentation et automatisation
        JobCategory::create([
            'program_id' => '7',
            'name' => 'Instrumentation et automatisation'
        ]);
    }
}
