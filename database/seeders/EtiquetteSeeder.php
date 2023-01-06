<?php

namespace Database\Seeders;

use Faker;
use App\Models\Plat;
use App\Models\Etiquette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $etiquette = new Etiquette();
        $etiquette->nom = "Atomic lunch";
        $etiquette->description = "Ca décape le rectum, digestif sournoisement inclus";
        $etiquette->save();
        
    }
}
