<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilieledenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familieleden', function (Blueprint $table) {
            $table->id()->unique();
            $table->String('familieid');
            $table->String('familienaam');
            $table->foreignId('userid');
            $table->boolean('beheerder');

            $table->foreign('familieid')->references('id')->on('families');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('familieleden');
    }
}
