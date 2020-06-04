<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voertijd extends Model
{
    protected $table = "voertijd";
    public $timestamps = false;

    public function getHondNaam() {
      return $this->hasOne('App\Hond', 'hond', 'naam');
    }
}
