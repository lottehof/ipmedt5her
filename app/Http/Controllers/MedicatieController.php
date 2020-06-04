<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Medicatie;
use App\Hond;
use App\User;

class MedicatieController extends Controller
{
  public function store(Request $request) {
    try {

      $voornaam = '';
      $achternaam = '';

      if ($request->input('toegewezen_aan') != Null) {
        list($voornaam, $achternaam) = explode('+', $request->input('toegewezen_aan'));
      }

      $medicatie = new Medicatie();
      $medicatie->hondid = Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first();
      $medicatie->medicatie_naam = $request->input('medicatie_naam');
      $medicatie->medicatie =  $request->input('medicatie');
      $medicatie->tijd =  $request->input('tijd');
      $medicatie->toegewezen_aan = User::where('name', '=', $voornaam)->where('surname', '=', $achternaam)->pluck('id')->first();

      $medicatie->save();

      return redirect('/taken');
    }
    catch(Exception $e) {
      return $e;
      // return redirect('/settings');
    }
  }

  public function update(Request $request, $medicatieid) {
    try {

        $voornaam = '';
        $achternaam = '';

        if ($request->input('toegewezen_aan') != Null) {
          list($voornaam, $achternaam) = explode('+', $request->input('toegewezen_aan'));
        }

        $medicatie = Medicatie::where('id', '=', $medicatieid)->update([
          'medicatie_naam' => $request->input('medicatie_naam'),
          'medicatie' => $request->input('medicatie'),
          'tijd' => $request->input('tijd'),
          'toegewezen_aan' => User::where('name', '=', $voornaam)->where('surname', '=', $achternaam)->pluck('id')->first(),
        ]);

        return redirect('/overzichtspagina');
      }
      catch(Exception $e) {
        // return redirect('/settings');
        return $e;
      }
  }

  public function destroy(Request $request, $medicatieid) {
    try {
      $medicatie = Medicatie::where('id', '=', $medicatieid);

      $medicatie->delete();

      return redirect('/overzichtspagina');
    }
    catch(Exception $e) {
      // return redirect('/settings');
      return $e;
    }
  }
}
