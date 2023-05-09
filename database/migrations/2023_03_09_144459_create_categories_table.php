<?php

use App\Models\categorie;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->default('')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });


        categorie::create(['name' => 'Intégration Web', 'slug' => 'Intégration', 'description' => 'Integrating mockups provided by a client']);
        categorie::create(['name' => 'Back-End', 'slug' => 'BackEnd', 'description' => 'Handling Server Side interractions']);
        categorie::create(['name' => 'Front-End', 'slug' => 'FrontEnd', 'description' => 'Handling Javascript and CSS/HTML']);
        categorie::create(['name' => 'Full-Stack', 'slug' => 'FullStack', 'description' => 'Handling both Front-End and Back-end']);
        categorie::create(['name' => 'Projet-Etudiant', 'slug' => 'Projet Etudiant', 'description' => 'School project']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
