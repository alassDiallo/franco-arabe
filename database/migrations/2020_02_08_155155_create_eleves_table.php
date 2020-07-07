<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom',20);
            $table->string('prenom',50);
            $table->string('nomUtilisateur',10);
            $table->string('sexe',6);
            $table->string('adresse',255);
            $table->string('telephone',12)->nullable()->default('Neant');
            $table->dateTime('dateDeNaissance');
            $table->string('lieuDeNaissance',50);
            $table->unsignedBigInteger('tuteur_id');
            $table->foreign('tuteur_id')
                  ->references('id')->on('tuteurs')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            //$table->string('motDePass');
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
        Schema::dropIfExists('eleves');
    }
}
