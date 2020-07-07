<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesseurMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_professeur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('professeur_id');
            $table->foreign('professeur_id')
                ->references('id')
                ->on('professeurs')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('matiere_id');
                $table->foreign('matiere_id')
                ->references('id')
                ->on('matieres')
                ->onDelete('restrict')
                ->onUpdate('cascade');
                //$table->integer('anneeDebut');
                //$table->integer('anneeFin');
                //$table->string('anneeScolaire',9);
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
        Schema::dropIfExists('professeur_matieres');
    }
}
