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
        Schema::create('oeuvres', function (Blueprint $table) {
            $table->id('idOeuvre');
            $table->string('nom');
            $table->text('description');
            $table->integer('annnee')->nullable();
// Artiste
$table->unsignedBigInteger('idArtiste')->nullable();
$table->foreign('idArtiste')->references('idArtiste')->on('artistes')->nullOnDelete();

// Catégorie
$table->unsignedBigInteger('idCategorie');
$table->foreign('idCategorie')->references('idCategorie')->on('categories')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oeuvres');
    }
};
