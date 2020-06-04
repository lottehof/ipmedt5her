<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWandelenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wandelen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hondid')->references('id')->on('hond');
            $table->string('uitlaat_tijd');
            $table->foreignId('toegewezen_aan')->nullable();

            $table->foreign('toegewezen_aan')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipmedt5', function(Blueprint $table){
          $table->dropForeign('wandelen_hond_foreign');
          $table->dropForeign('wandelen_families_foreign');
        });
        Schema::dropIfExists('wandelen');
    }
}
