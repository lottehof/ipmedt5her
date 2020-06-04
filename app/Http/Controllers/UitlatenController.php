<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uitlaten;

class UitlatenController extends Controller
{
  public function store($date, $detectie, Request $request) {

    $uitlaten = new Uitlaten();
    $uitlaten->timestamp = $date;
    $uitlaten->hond = 'Bobby';
    $uitlaten->riemDetectie = $detectie;

    try {
      $uitlaten->save();
      return redirect('/');
    }
    catch(Exception $e) {
      return redirect('/');
    }
  }
}
