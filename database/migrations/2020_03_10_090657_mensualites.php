<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mensualites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualites',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
            ->references('id')
            ->on('eleves')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('mois_id');
            $table->foreign('mois_id')
            ->references('id')
            ->on('mois')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            $table->double('montant_verser');
            $table->double('reste')->default(0.0);
            $table->string('anneeScolaire');
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
        //
    }
}
