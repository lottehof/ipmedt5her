<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

  Route::group(['prefix' => 'messages'], function () {
      Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
      Route::get('/unread', ['as' => 'messages.unread', 'uses' => 'MessagesController@unread']); // ajax + Pusher
      Route::get('/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
      Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
      Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
      Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
      Route::get('{id}/read', ['as' => 'messages.read', 'uses' => 'MessagesController@read']); // ajax + Pusher
  });

  Route::group(['prefix' => 'roles'], function () {
      Route::get('/index', 'RolesController@index');
  });

  Route::get('/home', 'OverzichtsController@overzicht')->name('home');

  Route::get('/taken', 'TakenController@taken');

  Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'SettingsController@show');
    Route::patch('/{email}/update', 'SettingsController@update');

    Route::post('/familieleden', 'FamilieController@store');
    Route::post('/familieleden/join', 'FamilieController@joinFamilie');
    Route::post('/familieleden/leave', 'FamilieController@leaveFamilie');
    Route::post('/familieleden/removemember/{target}', 'FamilieController@removeFromFamilie');

    Route::post('/hond/aanmelden', 'HondController@store');
    Route::post('/hond/afmelden/{hondid}', 'HondController@afmelden');

    Route::post('/hond/voertijd/add', 'VoertijdController@store');
    Route::patch('/hond/voertijd/update/{voertijdid}', 'VoertijdController@update');
    Route::delete('/hond/voertijd/destroy/{voertijdid}', 'VoertijdController@destroy');

    Route::post('/hond/medicatie/add', 'MedicatieController@store');
    Route::patch('/hond/medicatie/update/{medicatieid}', 'MedicatieController@update');
    Route::delete('/hond/medicatie/destroy/{medicatieid}', 'MedicatieController@destroy');


    Route::post('/hond/wandeling/add', 'WandelenController@store');
    Route::patch('/hond/wandeling/update/{wandelingid}', 'WandelenController@update');
    Route::delete('/hond/wandeling/destroy/{wandelingid}', 'WandelenController@destroy');
  });

  Route::middleware(['checkrole'])->group(function () {
    Route::get('/overzichtspagina', function () {
        return view('content.overzichtspagina');
    });
  });
  Route::group(['prefix' => 'overzichtspagina'], function () {
    Route::get('/', 'OverzichtsController@show');

    Route::get('/none', function () {
        return view('content.overzichtspagina');
    });
    Route::get('/ouder', function () {
        return view('content.overzichtspagina.ouder');
    });
    Route::get('/kind', function () {
        return view('content.overzichtspagina.kind');
    });
  });


}); // End auth & verified

Route::group(['prefix' => 'sensor'], function () {
  Route::get('/riemdetectie/store/{date}/{detectie}', 'UitlatenController@store');

  Route::get('/peilConditie/store/{date}/{conditie}', 'WaterController@store');

  Route::get('/gewichtdetectie/store/{data}/{conditie}', 'VoerenController@store');
});


Route::get('/voertijden', 'VoertijdController@voertijden');


Route::get('/', 'OverzichtsController@overzicht');

  //  return view('welcome');


Auth::routes(['verify' => true]);

Route::fallback( function () {
    return view('404');
});
