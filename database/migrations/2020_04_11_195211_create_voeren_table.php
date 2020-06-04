<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoerenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voeren', function (Blueprint $table) {
            $table->string('timeStamp');
            $table->string('hond')->references('naam')->on('hond');
            $table->string('gewicht');
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
          $table->dropForeign('voeren_hond_foreign');
        });
        Schema::dropIfExists('voeren');
    }
}
