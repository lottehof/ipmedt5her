<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Familie;
use App\Familieleden;
use App\User;
use Auth;

class FamilieController extends Controller
{

  public function removeFromFamilie(Request $request, $target) {
    $checkUser = User::get()->where('id','=',Auth::user()->id)->first();

    if ($checkUser->email != $target) {

      try {
        $user = User::where('email', '=', $target)->update([
          'familie' => '0',
          'role' => 'new',
        ]);

        $familie = Familieleden::where('userid','=', User::get()->where('email','=', $target)->pluck('userid')->first());
        $familie->delete();

        return redirect('/settings');
      }
      catch(Exception $e) {
        return $e;
        // return redirect('/settings');
      }

      return redirect('/settings');
    }
    else {
      return "Familiecontroller@removeFromFamilie - Can't remove yourself silly";
    }
  }

  public function leaveFamilie(Request $request) {
      try {
        $user = User::where('id','=',Auth::user()->id)->update([
          'familie' => '0',
          'role' => 'new',
        ]);

        $familie = Familieleden::where('userid','=',Auth::user()->id);
        $familie->delete();

        return redirect('/settings');
      }
      catch(Exception $e) {
        return $e;
        // return redirect('/settings');
      }

      return redirect('/settings');
  }

  public function joinFamilie(Request $request) {

    if (Familie::where('id','=', $request->input('familiecode'))->count() > 0) {
      try {
        $user = User::where('id','=',Auth::user()->id)->update([
          'familie' => $request->input('familiecode'),
          'role' => 'kind',
        ]);

        $familie = new Familieleden();
        $familie->familieid = $request->input('familiecode');
        $familie->familienaam = Familieleden::where('familieid','=', $request->input('familiecode'))->pluck('familienaam')->first();
        $familie->userid = Auth::user()->id;
        $familie->beheerder = 0;
        $familie->save();
        return redirect('/settings');
      }
      catch(Exception $e) {
        return $e;
        // return redirect('/settings');
      }

      return redirect('/settings');
    }
    else {
      return "Error - Familie bestaat niet";
    }
  }


  public function store(Request $request) {

    $newFamilieId = Str::random(6);

    $families = new Familie();
    $families->id = $newFamilieId;

    try {
      $families->save();
    }
    catch(Exception $e) {
      return $e;
      // return redirect('/settings');
    }

    $user = User::where('id','=',Auth::user()->id)->update([
      'familie' => $newFamilieId,
      'role' => 'ouder',
    ]);

    $familie = new Familieleden();
    $familie->familieid = $newFamilieId;
    $familie->familienaam = $request->input('familienaam');
    $familie->userid = Auth::user()->id;
    $familie->beheerder = 1;

    try {
      $familie->save();
      return redirect('/settings');
    }
    catch(Exception $e) {
      return $e;
      // return redirect('/settings');
    }
  }

  // public function update(Request $request) {
  //   try {
  //     $familie = Familieleden::where('naam','=',Auth::user()->id)->update([
  //       'naam' => $request->input('naam'),
  //       'merk' => $request->input('merk'),
  //       'alcoholpercentage' => $request->input('alcoholpercentage'),
  //       'kleur_EBC' => $request->input('kleur_EBC'),
  //       'bitterheid_EBU' => $request->input('bitterheid_EBU'),
  //       'biersoort' => $request->input('biersoort'),
  //       'image_location' => $request->input('image_location'),
  //     ]);
  //     // $temp->save();
  //     return redirect('/settings');
  //   }
  //   catch(Exception $e) {
  //     return redirect('/settings');
  //     // return $e;
  //   }
  // }

  // public function destroy($familieid, Request $request) {
  //   $familie = Familieleden::where('naam','=',$familieid);
  //   try {
  //     $request->session()->put('restore_bier', $bier->first());
  //     $bier->delete();
  //     return redirect('/badmin')->with('restore', $request->session()->get('restore_bier'));
  //   }
  //   catch(Exception $e) {
  //     // Catches all exceptions, make a seperate one for each exception so you
  //     return redirect('/settings');
  //     // return $e;
  //   }
  // }

//   public function restore(Request $request) {
//     $restored = $request->session()->get('restore_familie');
//
//     $familie = new Familie();
//     $familie->naam = $restored->naam;
//
//     try {
//       $familie->save();
//       $request->session()->put('restore_familie', null);
//       return redirect('/badmin');
//     }
//     catch (Exception $e) {
//       return redirect('/bier');
//     }
//   }
}
