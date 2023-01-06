<?php

namespace Database\Seeders;

use Faker;
use App\Models\Categorie;
use App\Models\PhotoPlat;
use App\Models\Plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        // Toutes les catégories.
        // ::all() est l'équivalent d'un "SELECT * FROM categorie" en SQL.
        $categories = Categorie::all();
        
        // Le nombre d'éléments dans la collection.
        $categoriesCount = $categories->count();
        
        // La première catégorie (id 1 entrée).
        $categorieEntree = $categories->first();  
        
        // La deuxième catégorie (id 2 plat).
        // Categorie::find est l'équivalent d'un "SELECT * FROM categorie WHERE id = 2" en SQL.
        $categoriePlatPrincipal = Categorie::find(2);
        
        // La troisième catégorie.
        $categorieDessert = Categorie::find(3);
        
        // Les catégories restantes.
        $categoriePetitDejeuner = Categorie::find(4);
        $categorieBoisson = Categorie::find(5);  
        
        
        // Toutes les photos.
        $photos = PhotoPlat::all();
        // La première photo.
        $photo = $photos->first();
        // La seconde photo.
        $photo = PhotoPlat::find(2);

        $platDatas = [
            [
                'nom' => 'Jambonneau géant',
                'description' => '5kgs de barbaque porcine à la moutarde, sans légumes ni féculents, bien sûr
                (plat "de chevet" des fonctionnaires communistes en France).',
                'prix' => 49.50,
                'epingle' => false,
                'photo_plat_id' => $photo->id,
                'categorie_id' => $categoriePlatPrincipal->id,
            ],
        
            [
                'nom' => 'Ravioles du congélateur',
                'description' => 'Rafraîchissantes... Bon débarras',
                'prix' => 0.80,
                'epingle' => false,
                'photo_plat_id' => $photo->id,
                'categorie_id' => $categorieEntree->id,
            ],

            [
                'nom' => 'Andouillette fourrée à la confiture de figue',
                'description' => 'Spécialité allemande',
                'prix' => 32.40,
                'epingle' => false,
                'photo_plat_id' => $photo->id,
                'categorie_id' => $categorieDessert->id

            ]
        
        
        ];

        foreach ($platDatas as $platData) {
            $plat = new Plat();
            $plat->nom = $platData['nom'];
            $plat->description = $platData['description'];
            $plat->prix = $platData['prix'];
            $plat->epingle = $platData['epingle'];
            $plat->photo_plat_id = $platData['photo_plat_id'];
            $plat->categorie_id = $platData['categorie_id'];
            $plat->save();
        }

        for ($i = 0; $i < 100; $i++) {
            
            // Création d'un nouveau plat.
            $plat = new Plat();
            
            // Affectation d'un nom.
            $plat->nom = $faker->words(2, true);
            
            // Affectation d'une description.
            $plat->description = $faker->words(10, true);
            
            // Affectation d'un prix.
            // Le prix est aléatoire, compris entre 1 et 50 avec deux chiffres après la virgule.
            // Version alternative avec faker :
            // $plat->prix = $faker->randomFloat(2, 1, 50);
            $plat->prix = random_int(100, 1000) / 100;
            
            // Séléction du statut "épinglé" / "non épinglé".
            // Le statut épinglé est aléatoire, 0 == false, 1 == true.
            $plat->epingle = (bool) random_int (0, 1);
            
            // Affectation d'une photo.
            $plat->photo_plat_id = $photo->id;
            
            // Affectation d'une catégorie.
            // La catégorie est choisie  au hasard.
            // Un nombre aléatoire est tiré entre 0 et 5-1 (c-à-d 4).
            $categorieIndex = random_int(0, $categoriesCount - 1);
            // On utilise le nombre tiré au hasard pour accéder au Nième élément de la collection de catégories.
            $categorie = $categories->get($categorieIndex);
            $plat->categorie_id = $categorie->id;
            
            // Sauvegarde dans la BDD.
            $plat->save();
        }
    }
}
