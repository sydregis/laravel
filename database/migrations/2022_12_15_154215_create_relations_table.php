<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquette_plat', function (Blueprint $table) {
            $table->foreignId('etiquette_id')->references('id')->on('etiquette');
            $table->foreignId('plat_id')->references('id')->on('plat');
        
        });

        // Modification de la table plat
        Schema::table('plat', function (Blueprint $table) {
            // Création d'une clé étrangère qui relie un plat et sa photo
            $table->foreignId('photo_plat_id')->references('id')->on('photo_plat');
            // Création d'un index (accélérateur de recherche) pour la clé étrangère
            $table->index('photo_plat_id');
            // Création d'une clé étrangère qui relie un plat et sa catégorie
            $table->foreignId('categorie_id')->references('id')->on('categorie');
            // Création d'un index pour la clé étrangère
            $table->index('categorie_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiquette_plat');

        //Modification de la table plat
        Schema::table('plat', function (Blueprint $table) {
            $table->dropIndex(['photo_plat_id']);
            $table->dropForeign(['photo_plat_id']);
            $table->dropColumn('photo_plat_id');

            $table->dropIndex(['categorie_id']);
            $table->dropForeign(['categorie_id']);
            $table->dropColumn('categorie_id');
        
        });
    }
};
