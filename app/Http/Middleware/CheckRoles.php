<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::user()->role == "ouder") {
        return redirect('/overzichtspagina/ouder');
      }
      elseif (Auth::user()->role == "kind") {
        return redirect('/overzichtspagina/kind');
      }
      return redirect('/overzichtspagina/none');
    }
}
