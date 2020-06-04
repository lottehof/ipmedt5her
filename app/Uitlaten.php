<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uitlaten extends Model
{
    protected $table = "uitlaten";
    public $timestamps = false;

    public function getHondNaam() {
        return $this->hasOne('App\Hond', 'hond', 'naam');
    }
}
