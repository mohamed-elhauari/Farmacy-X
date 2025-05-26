<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Code CIP (Code Identifiant de Présentation) - unique pour chaque médicament
            $table->string('nom_commercial'); // Ex: Doliprane
            $table->string('dci')->nullable(); // Dénomination Commune Internationale (Paracétamol)
            $table->enum('categorie', [
                'Neurologique et psychiatrie',
                'Antidouleur et anti-inflammatoire',
                'Complément alimentaire',
                'Produit dermatologique',
                'Médicament cardiovasculaire',
                'Antibiotique',
                'Antidouleur',
                'Produit pédiatrique',
                'Matériel médical',
                'Produit vétérinaire'
            ]);
            $table->string('laboratoire'); // Ex: SANOFI
            $table->enum('forme', [
                'Comprimé',
                'Gélule',
                'Sirop',
                'Injection',
                'Pommade',
                'Gouttes',
                'Suppositoire',
                'Solution buvable',
                'Aérosol',
                'Autre'
            ]);
            $table->string('dosage')->nullable(); // Ex: 500mg, 20mg/ml
            $table->boolean('sur_ordonnance')->default(false);
            $table->decimal('ppv', 8, 2)->nullable(); // Prix Public de Vente
            $table->integer('seuil_reappro')->default(10);
            $table->timestamps();
        });

        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('lot'); // looooooot
            $table->foreignId('medicine_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_achat', 8, 2); // Prix d'achat pour la pharmacie
            $table->date('date_expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
        Schema::dropIfExists('inventories');
    }
};
