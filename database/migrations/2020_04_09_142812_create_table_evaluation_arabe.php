<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEvaluationArabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluationArabes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('anneeScolaire',9);
            $table->integer('note');
            $table->string('semestre');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                  ->references('id')
                  ->on('eleves')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('matiere_arabe_id');
            $table->foreign('matiere_arabe_id')
                  ->references('id')
                  ->on('matiere_arabes')
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
        Schema::dropIfExists('evaluationArabes');
    }
}
