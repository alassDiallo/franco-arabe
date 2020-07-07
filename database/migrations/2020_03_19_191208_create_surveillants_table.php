<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveillantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveillants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('telephone')->unique();
            $table->string('nomUtilisateur')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('sexe');
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
        Schema::dropIfExists('surveillants');
    }
}
