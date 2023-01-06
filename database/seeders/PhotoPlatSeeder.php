<?php

namespace Database\Seeders;

use App\Models\PhotoPlat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoPlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
    
        $photoDatas = [
            "img\plats\jambonneau-sauce-moutarde-800x477.jpg",
            "img\plats\pexels-elle-hughes-2647936.jpg"
        ];
    
        foreach ($photoDatas as $photoData) {
            // Création d'une nouvelle photo.
            $photo = new PhotoPlat();
            // Séléction du fichier jpg.
            $photo->chemin = $photoData;
            // Sauvegarde dans la BDD.
            $photo->save();
        }
    }
}
