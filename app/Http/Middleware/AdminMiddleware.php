<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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



        if (Auth::user()->user_role == 3) {
            Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'User role account can not  access web part, please contact Admin.');

            //  abort(400);
        } elseif (Auth::user()->user_role == 2) {

             if(Auth::user()->status  == "0" ) {

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('error', 'your account is deactivated. Please contact administrator.');
            }else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
        return $next($request);
    }
}
