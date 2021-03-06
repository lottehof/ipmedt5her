<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detectie extends Model
{
    protected $table = "honddetectie";
    public $timestamps = false;

    public function getHondNaam() {
        return $this->hasOne('App\Hond', 'hond', 'naam');
    }
}
