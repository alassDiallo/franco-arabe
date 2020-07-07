<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMoyenneArabeToTableBultin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bultins', function (Blueprint $table) {
         $table->double('moyenneArabe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bultins', function (Blueprint $table) {
            $table->dropColumn('moyenneArabe');
        });
    }
}
