<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetectieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detectie', function (Blueprint $table) {
            $table->string('timeStamp');
            $table->string('hond')->references('naam')->on('hond');
            $table->string('hondDetectie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hond', function(Blueprint $table){
            $table->dropForeign('detectie_hond_foreign');
        });
        Schema::dropIfExists('detectie');
    }
}
