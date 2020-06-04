<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wandelen;
use App\Hond;
use App\User;

class WandelenController extends Controller
{
  public function store(Request $request) {
    try {

      $voornaam = '';
      $achternaam = '';

      if ($request->input('toegewezen_aan') != Null) {
        list($voornaam, $achternaam) = explode('+', $request->input('toegewezen_aan'));
      }


      $wandelen = new Wandelen();

      $wandelen->hondid = Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first();
      $wandelen->uitlaat_tijd = $request->input('uitlaat_tijd');
      $wandelen->toegewezen_aan = User::where('name', '=', $voornaam)->where('surname', '=', $achternaam)->pluck('id')->first();

      $wandelen->save();

      return redirect('/taken');
    }
    catch(Exception $e) {
      return $e;
      // return redirect('/settings');
    }
  }

  public function update(Request $request, $wandelenid) {
    try {

        $voornaam = '';
        $achternaam = '';

        if ($request->input('toegewezen_aan') != Null) {
          list($voornaam, $achternaam) = explode('+', $request->input('toegewezen_aan'));
        }

        $wandelen = Wandelen::where('id', '=', $wandelenid)->update([
          'uitlaat_tijd' => $request->input('uitlaat_tijd'),
          'toegewezen_aan' => User::where('name', '=', $voornaam)->where('surname', '=', $achternaam)->pluck('id')->first(),
        ]);


        return redirect('/overzichtspagina');
      }
      catch(Exception $e) {
        // return redirect('/settings');
        return $e;
      }
  }

  public function destroy(Request $request, $wandelenid) {
    try {
      $wandelen = Wandelen::where('id', '=', $wandelenid);

      $wandelen->delete();

      return redirect('/overzichtspagina');
    }
    catch(Exception $e) {
      // return redirect('/settings');
      return $e;
    }
  }
}
