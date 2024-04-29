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
        Schema::create('condidat_enseignant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('enseignant')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('structure_de_recherche');
            $table->string('etablissement');
            $table->string('email');
            $table->string('telephone');
            $table->string('description_traveaux');
            $table->string('pertinence_impact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condidat_enseignant');
    }
};
