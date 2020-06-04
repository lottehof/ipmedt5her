<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detectie;

class DetectieController extends Controller
{
  public function store($date, $detectie, Request $request){
      $detectie = new Detectie();
      $detectie->timeStamp = $date;
      $detectie->hond = "Bobby";
      $detectie->hondDetectie = $detectie;

      try{
        $detectie->save();
        return redirect('/');
      }
      catch(Exception $e) {
        return redirect('/');
      }
  }
}
