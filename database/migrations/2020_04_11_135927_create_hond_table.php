<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hond', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('naam');
          $table->integer('leeftijd');
          $table->string('geslacht');
          $table->string('gewicht');
          $table->string('ras');
          $table->string('familie');
          $table->boolean('afgemeld')->default('0');

          $table->foreign('familie')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('families', function(Blueprint $table){
            $table->dropForeign('hond_families_foreign');
        });
        Schema::dropIfExists('hond');
    }
}
