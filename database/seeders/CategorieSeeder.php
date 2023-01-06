<?php

namespace Database\Seeders;

use Faker;
use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create('fr_FR');

        $categorieDatas = ["entrée", "plat", "dessert", "petit déjeuner", "boisson"];

        foreach ($categorieDatas as $categorieData) {
            // Création d'une nouvelle catégorie.
            $categorie = new Categorie();
            // Affectation d'un nom.
            $categorie->nom = $categorieData;
            // Affectation d'une description.
            $categorie->description = $faker->words(8, true);
            // Sauvegarde dans la BDD.
            $categorie->save();
        }
    }
}
