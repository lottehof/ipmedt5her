<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voertijd;
use App\Hond;
use App\User;
use Auth;

class VoertijdController extends Controller
{
  public function voertijden() {
    return Voertijd::all()->pluck('voertijd');
  }

  public function store(Request $request) {
    try {

      $voornaam = '';
      $achternaam = '';

      if ($request->input('toegewezen_aan') != Null) {
        list($voornaam, $achternaam) = explode('+', $request->input('toegewezen_aan'));
      }


      $voertijdmoment = 1;

      $voertijd = new Voertijd();
      $voertijd->voermoment = $voertijdmoment;
      $voertijd->voertijd = $request->input('voertijd');
      $voertijd->hoeveel_voer = $request->input('hoeveel_voer');
      $voertijd->hondid = Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first();
      $voertijd->toegewezen_aan = User::where('name', '=', $voornaam)->where('surname', '=', $achternaam)->pluck('id')->first();


      $voertijd->save();

      $this->sorteerVoertijden(Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first());

      return redirect('/taken');
    }
    catch(Exception $e) {
      return $e;
      // return redirect('/settings');
    }
  }

  public function update(Request $request, $voertijdid) {
    try {

          $voornaam = '';
          $achternaam = '';

          if ($request->input('toegewezen_aan') != Null) {
            list($voornaam, $achternaam) = explode('+', $request->input('toegewezen_aan'));
          }

          $voertijd = Voertijd::where('id', '=', $voertijdid)->update([
            'voertijd' => $request->input('voertijd'),
            'hoeveel_voer' => $request->input('hoeveel_voer'),
            'toegewezen_aan' => User::where('name', '=', $voornaam)->where('surname', '=', $achternaam)->pluck('id')->first(),
          ]);

          $this->sorteerVoertijden(Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first());

          return redirect('/overzichtspagina');
        }
        catch(Exception $e) {
          // return redirect('/settings');
          return $e;
        }
  }

  public function destroy(Request $request, $voertijdid) {
    try {
      $voertijd = Voertijd::where('id', '=', $voertijdid);
      $voertijd->delete();

      $this->sorteerVoertijden(Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first());

      return redirect('/overzichtspagina');
    }
    catch(Exception $e) {
      // return redirect('/settings');
      return $e;
    }
  }

  private function sorteerVoertijden($hondid) {
    $voertijden = Voertijd::orderBy('voertijd', 'asc')->get()->where('hondid', '=', $hondid);
    $counter = 1;

    foreach ($voertijden as $voertijd) {
      $voertijd->voermoment = $counter;
      $counter +=1;
      try {
        $voertijd->save();
      }
      catch(Exception $e) {
        // return redirect('/settings');
        return $e;
      }
    }
  }
}
