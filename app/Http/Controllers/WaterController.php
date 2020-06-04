<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Water;

class WaterController extends Controller
{
    public function store($date, $conditie, Request $request){
        $water = new Water();
        $water->timeStamp = $date;
        $water->hond = "Bobby";
        $water->peilConditie = $conditie;

        try{
          $water->save();
          return redirect('/');
        }
        catch(Exception $e) {
          return redirect('/');
        }
    }
}
