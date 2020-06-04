<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Hond;

class HondController extends Controller
{
  public function store(Request $request) {
    try {
      $hond = new Hond();
      $hond->naam = $request->input('naam');
      $hond->leeftijd = $request->input('leeftijd');
      $hond->geslacht = $request->input('geslacht');
      $hond->gewicht = $request->input('gewicht');
      $hond->ras = $request->input('ras');
      $hond->familie = Auth::user()->familie;

      $hond->save();
      return redirect('/settings');
    }
    catch(Exception $e) {
      return $e;
      // return redirect('/settings');
    }
  }

  public function afmelden(Request $request, $hondid) {
    try {
      $hond = Hond::where('id', '=', $hondid)->update([
        'afgemeld' => 1,
      ]);

      return redirect('/settings');
    }
    catch(Exception $e) {
      // return redirect('/settings');
      return $e;
    }
  }
}
