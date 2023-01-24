<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychologistesSpecialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychologistes_specialites', function (Blueprint $table) {
            $table->unsignedBigInteger('psychologiste_id');
            $table->unsignedBigInteger('specialite_id');
            $table->timestamps();
            $table->unique(['psychologiste_id', 'specialite_id']);
            $table->foreign('psychologiste_id')->references('id')->on('psychologistes');
            $table->foreign('specialite_id')->references('id')->on('specialites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psychologistes_specialites');
    }
}
