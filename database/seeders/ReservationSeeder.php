<?php

namespace Database\Seeders;

use Faker;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
            $faker = Faker\Factory::create('fr_FR');
        
            // 2 réservations avec des données statiques :
        
            $reservationDatas = [
            [   
                
                'nom' => "L'Enclume",
                'prenom' => 'Pierrot',
                'jour' => "2023-01-06",
                'heure' => "19:00:00",
                'nombre_de_personnes' => 4,
                'numero_de_telephone' => "0611111111",
                'email' => "PlE@staticbait.fr"
            ],
                
            [

                'nom' => "Alexandre",
                'prenom' => 'Gilbert',
                'jour' => "2023-01-13",
                'heure' => "18:30:00",
                'nombre_de_personnes' => 8,
                'numero_de_telephone' => "0622222222",
                'email' => "GA@dynamicbait.be"
            ]
        ];

        foreach ($reservationDatas as $reservationData) {
            $reservation = new reservation();
            $reservation->nom = $reservationData['nom'];
            $reservation->prenom = $reservationData['prenom'];
            $reservation->jour = $reservationData['jour'];
            $reservation->heure = $reservationData['heure'];
            $reservation->nombre_de_personnes = $reservationData['nombre_de_personnes'];
            $reservation->numero_de_telephone = $reservationData['numero_de_telephone'];
            $reservation->email = $reservationData['email'];
            $reservation->save();
        }

        
        
        // 48 réservations avec des données aléatoires
        
        for ($i = 0; $i <48; $i++) {
            
            // Nouvelle réservation
            $reservation = new Reservation();

            // Nom
            $reservation-> nom = $faker->lastName;
            $nom = strtolower($reservation->nom);
            $nom = str_replace("ô", "o", $nom);
            $nom = str_replace(" ", ".", $nom);
            $nom = str_replace("é", "e", $nom);
            $nom = str_replace("è", "e", $nom);
            $nom = str_replace("É", "e", $nom);
            $nom = str_replace("'", ".", $nom);
            $nom = str_replace("ë", "e", $nom);
            $nom = str_replace("ê", "e", $nom);
            
            // Prénom
            $reservation-> prenom = $faker->firstName;
            $prenom = strtolower($reservation->prenom);
            $prenom = str_replace("ô", "o", $prenom);
            $prenom = str_replace(" ", ".", $prenom);
            $prenom = str_replace("é", "e", $prenom);
            $prenom = str_replace("è", "e", $prenom);
            $prenom = str_replace("É", "e", $prenom);
            $prenom = str_replace("'", ".", $prenom);
            $prenom = str_replace("ë", "e", $prenom);
            $prenom = str_replace("ê", "e", $prenom);

            // Jour
            $reservation-> jour = $faker ->date('Y-m-d');
            
            // Heure
            $reservation-> heure = $faker ->time('H:i');
            
            // Le nombre de personnes
            $reservation-> nombre_de_personnes = random_int(1, 20);

            // Tel
            $reservation-> numero_de_telephone = $faker->phoneNumber;

            // Email
            $reservation-> email = $prenom. "." .$nom. "@risotto.fr";
            
            // Sauvegarde dans la BDD.
            $reservation->save();
        }
    }
}
