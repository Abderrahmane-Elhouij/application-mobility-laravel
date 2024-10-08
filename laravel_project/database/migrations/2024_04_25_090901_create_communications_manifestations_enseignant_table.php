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
        Schema::create('communications_manifestations_enseignant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('enseignant')->onDelete('cascade');
            $table->string('titre');
            $table->string('intitulee');
            $table->string('lieu');
            $table->date('date');
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
        Schema::dropIfExists('communications_manifestations_enseignant');
    }
};
