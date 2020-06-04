<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoertijdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voertijd', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('voermoment');
            $table->string('voertijd');
            $table->string('hoeveel_voer');
            $table->foreignId('hondid');
            $table->foreignId('toegewezen_aan')->nullable();

            $table->foreign('hondid')->references('id')->on('hond');
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
          $table->dropForeign('voertijd_hond_foreign');
          $table->dropForeign('voertijd_families_foreign');
        });
        Schema::dropIfExists('voertijd');
    }
}
