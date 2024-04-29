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
        Schema::create('theses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('doctorants')->onDelete('cascade');
            $table->string('titre');
            $table->string('nom_encadrant');
            $table->string('prenom_encadrant');
            $table->date('date_inscription');
            $table->string('description_sujet');
            $table->string('description_traveaux');
            $table->string('pertience_et_Impact');
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
        Schema::dropIfExists('theses');
    }
};
