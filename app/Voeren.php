<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voeren extends Model
{
    protected $table = "voeren";
    public $timestamps = false;

    public function getHondNaam() {
      return $this->hasOne('App\Hond', 'hond', 'naam');
    }
}
