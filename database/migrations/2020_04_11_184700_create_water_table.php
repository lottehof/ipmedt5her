<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water', function (Blueprint $table) {
            $table->string('timeStamp');
            $table->string('hond')->references('naam')->on('hond');
            $table->string('peilConditie');
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
            $table->dropForeign('water_hond_foreign');
        });
        Schema::dropIfExists('water');
    }
}
