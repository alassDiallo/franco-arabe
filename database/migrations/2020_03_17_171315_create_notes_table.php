<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('anneeScolaire',9);
            //$table->integer('devoir1');
            //$table->integer('devoir2');
            $table->double('note');
            $table->string('nomEvaluation');
            //$table->integer('anneeDebut');
            //$table->integer('anneeFin');
            $table->string('semestre');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                  ->references('id')
                  ->on('eleves')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('matiere_id');
            $table->foreign('matiere_id')
                  ->references('id')
                  ->on('matieres')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('notes');
    }
}
