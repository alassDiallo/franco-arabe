<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBultinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bultins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semestre');
            //$table->integer('anneeDebut');
            //$table->integer('anneeFin');
            $table->string('anneeScolaire',9);
            $table->float('moyenne');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                  ->references('id')
                  ->on('eleves')
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
        Schema::dropIfExists('bultins');
    }
}
