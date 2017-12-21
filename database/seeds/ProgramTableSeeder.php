<?php

use Illuminate\Database\Seeder;
use App\Program;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add Teccart's DEC and AEC programs :: Informatique seulement
        Program::create([
            'name' => 'DEFAULT',
            'code' => '0',
        ]);

        Program::create([
            'name' => 'INFORMATIQUE DE GESTION',
            'code' => '420.AA',
        ]);

        Program::create([
            'name' => 'GESTION DES RÉSEAUX',
            'code' => '420.AC',
        ]);

        Program::create([
            'name' => 'TÉLÉCOMMUNICATIONS',
            'code' => '243.BA',
        ]);

        Program::create([
            'name' => 'SOUTIEN INFORMATIQUE',
            'code' => 'AEC',
        ]);

        Program::create([
            'name' => 'ÉLÉCTRONIQUE INDUSTRIELLE',
            'code' => '243.CO',
        ]);

        Program::create([
            'name' => 'INSTRUMENTATION ET AUTOMATISATION',
            'code' => 'ELJ.35',
        ]);
    }
}
