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
        Schema::create('mobilites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('doctorants')->onDelete('cascade');
            $table->string('universite_dacceuil');
            $table->string('ville');
            $table->string('pays');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('carte_mobilite');
            $table->string('joindre_justicatif')->nullable();
            $table->string('invitation')->nullable();
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
        Schema::dropIfExists('mobilites');
    }
};
