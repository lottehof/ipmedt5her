<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detectie;

class DetectieController extends Controller
{
  public function store($date, $detectie, Request $request){
      $honddetectie = new Detectie();
      $honddetectie->timeStamp = $date;
      $honddetectie->hond = "Bobby";
      $honddetectie->hondDetectie = $detectie;

      try{
         $honddetectie->save();
         return redirect('/');
      }
      catch(Exception $e) {
        return redirect('/');
      }
  }
}
