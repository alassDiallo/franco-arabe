<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMatiereArs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiereArs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')
                    ->references('id')
                    ->on('classes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('matiere_arabe_id');
            $table->foreign('matiere_arabe_id')
                    ->references('id')
                    ->on('matiere_arabes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->integer('coefficient');
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
        Schema::dropIfExists('matiereArs');
    }
}
