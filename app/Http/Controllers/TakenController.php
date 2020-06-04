<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\User;
use App\Familieleden;
use App\Hond;
use App\Voertijd;
use App\Medicatie;
use App\Wandelen;
use App\Uitlaten;
use App\Water;
use App\Voeren;
use Auth;

class TakenController extends Controller
{
  public function taken() {

    $roles = Roles::where('option','=',1)->get();
    $user =  User::where('email','=',Auth::user()->email)->first();
    $familie = Familieleden::get()->where('familieid','=',Auth::user()->familie)->first();
    $familieleden = User::where('familie', '=', Auth::user()->familie)->get();
    $honden = Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 1)->get();


    if (Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->count() > 0) {

      $hond = Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->first();
      $voertijden = Voertijd::orderBy('voermoment', 'asc')->get()->where('hondid', '=', Hond::where('familie', '=', Auth::user()->familie)->where('afgemeld', '=', 0)->pluck('id')->first());
      $medicatie = Medicatie::orderBy('tijd', 'asc')->where('hondid', '=', $hond->id)->get();
      $wandelingen = Wandelen::orderBy('uitlaat_tijd', 'asc')->where('hondid', '=', $hond->id)->get();

      return view('content.taken', [
        'roles' => $roles,
        'user' => $user,
        'familie' => $familie,
        'familieleden' => $familieleden,
        'hond' => $hond,
        'honden' => $honden,
        'voertijden' => $voertijden,
        'medicatie' => $medicatie,
        'wandelingen' => $wandelingen,
      ])
      ->with('riemdetectie', Uitlaten::all())
      ->with('peilConditie', Water::all())
      ->with('gewichtDetectie', Voeren::all());
    }

    $hond = new Hond();
    $hond->id = 't';
    $hond->naam = 'fake';
    $hond->leeftijd = '0';
    $hond->gewicht = '0';
    $hond->ras = 'none';
    $hond->familie = Auth::user()->familie;

    $voertijden = new Voertijd();
    $voertijden->id = 1;
    $voertijden->voertijd = '00:00';
    $voertijden->hondid = 't';

    $medicatie = new Medicatie();
    $wandelingen = new Wandelen();

    return view('content.taken', [
      'roles' => $roles,
      'user' => $user,
      'familie' => $familie,
      'familieleden' => $familieleden,
      'hond' => $hond,
      'honden' => $honden,
      'voertijden' => $voertijden,
      'medicatie' => $medicatie,
      'wandelingen' => $wandelingen,
    ])
    ->with('riemdetectie', Uitlaten::all())
    ->with('peilConditie', Water::all())
    ->with('gewichtDetectie', Voeren::all());
  }
}
