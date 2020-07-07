<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseEleveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->integer('anneeDebut');
            //$table->integer('anneeFin');
            $table->string('anneeScolaire',9);
            $table->double('montant');
            $table->double('reliquat');
            $table->integer('statu');
            //$table->date('dateInscription');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')
            ->references('id')
            ->on('classes')
            ->onDelete('restrict')->onUpdate('Cascade');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
            ->references('id')
            ->on('eleves')
            ->onDelete('restrict')->onUpdate('Cascade');
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
        Schema::dropIfExists('classe_eleve');
    }
}
