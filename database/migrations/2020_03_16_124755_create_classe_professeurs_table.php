<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseProfesseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_professeur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('professeur_id');
            $table->foreign('professeur_id')
                ->references('id')
                ->on('professeurs')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('classe_id');
                $table->foreign('classe_id')
                ->references('id')
                ->on('classes')
                ->onDelete('restrict')
                ->onUpdate('cascade');
                //$table->integer('anneeDebut');
                //$table->integer('anneeFin');
                $table->string('anneeScolaire',9);
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
        Schema::dropIfExists('classe_professeurs');
    }
}
