<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Tutor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
/*        if ($request->user()->get('type_of_user') == 'acudiente') {
            echo "eres acudiente";
        }else{
            echo "no eres acudiente";
        }*/
 //       dd(Auth::user());
/*        $user = Auth::guard(<GUARD_NAME>)->user();
        $user->type_of_user;*/
 //       dd(Auth::user()->type_of_user);
        if (Auth::user()->type_user == 'tutor') {
            return $next($request);
        }else{
            return abort(403, 'No eres un acudiente, padre o madre, por lo cual no tienes permiso para estar en esta pagina');
        }
    }
}
