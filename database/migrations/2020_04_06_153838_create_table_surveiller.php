<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSurveiller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveillers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('anneeScolaire');
            $table->unsignedBigInteger('surveillant_id');
            $table->foreign('surveillant_id')
                  ->references('id')
                  ->on('surveillants')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
                  $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')
                  ->references('id')
                  ->on('classes')
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
        Schema::table('surveillers', function (Blueprint $table) {
            $table->dropIfExists('surveillers');
        });
    }
}
