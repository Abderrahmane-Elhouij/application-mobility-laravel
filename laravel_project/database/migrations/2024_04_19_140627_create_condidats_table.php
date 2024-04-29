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
        Schema::create('condidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('doctorants')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('structure_de_recherche');
            $table->string('etablissement');
            $table->string('ced');
            $table->string('fd');
            $table->string('email');
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
        Schema::dropIfExists('condidats');
    }
};
