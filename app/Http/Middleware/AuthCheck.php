<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //unauthorized user
        if(!session()->has('LoggedUser') && ($request->path() != 'login'))
        {
            return redirect(route('login'))->with('fail', 'You must be logged in');
        }

        if(session()->has('LoggedUser') && strpos($request->path(), 'admin') !== false && User::getCurrentUser()->access_level < 4)
        {
            return redirect(route('dashboard'))->with('fail', 'Sorry, you don`t have enough access!');
        }

        //authorized user trying to get to login page
        if(session()->has('LoggedUser') && ($request->path() == 'login'))
        {
            return redirect(route('dashboard'));
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
