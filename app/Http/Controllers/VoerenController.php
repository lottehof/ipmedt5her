<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voeren;

class VoerenController extends Controller
{
  public function store($date, $detectie, Request $request){
    $voeren = new Voeren();
    $voeren->timeStamp = $date;
    $voeren->hond = "Bobby";
    $voeren->gewicht = $detectie;

    try{
      $voeren->save();
      return redirect('/');
    }
    catch(Exception $e) {
      return redirect('/');
    }
  }
}
