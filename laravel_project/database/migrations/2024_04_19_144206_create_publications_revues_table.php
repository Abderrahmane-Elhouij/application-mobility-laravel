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
        Schema::create('publications_revues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('doctorants')->onDelete('cascade');
            $table->string('titre_article');
            $table->string('noms_auteurs');
            $table->string('titre_revue');
            $table->string('volume');
            $table->integer('numero');
            $table->date('date_publication');
            $table->integer('numero_page');
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
        Schema::dropIfExists('publications_revues');
    }
};
