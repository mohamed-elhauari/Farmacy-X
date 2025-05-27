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
            $table->string('commercial_name'); // Ex: Doliprane
            $table->string('dci')->nullable(); // Dénomination Commune Internationale (Paracétamol)
            $table->enum('category', [
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
            $table->string('laboratory'); // Ex: SANOFI
            $table->enum('form', [
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
            $table->boolean('prescription_required')->default(false);
            $table->decimal('ppv', 8, 2)->nullable(); // Prix Public de Vente
            $table->integer('reorder_threshold')->default(20);
            $table->timestamps();
        });

        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('lot'); // looooooot
            $table->foreignId('medicine_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('purchase_price', 8, 2); // Prix d'achat pour la pharmacie
            $table->date('expiration_date')->nullable();
            $table->string('dco')->nullable(); // "durée de conservation après ouverture" (DCO) eg. 2 mois
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
