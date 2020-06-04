<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUitlatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uitlaten', function (Blueprint $table) {
            $table->string('timestamp')->unique();
            $table->string('hond')->references('naam')->on('hond');
            $table->string('riemDetectie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('uitlaten', function(Blueprint $table){
              $table->dropForeign('uitlaten_hond_foreign');
          });
          Schema::dropIfExists('uitlaten');
    }
}
