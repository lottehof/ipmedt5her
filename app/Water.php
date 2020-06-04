<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $table = "water";
    public $timestamps = false;

    public function getHondNaam() {
    return $this->hasOne('App\Hond', 'hond', 'naam');
}
}
