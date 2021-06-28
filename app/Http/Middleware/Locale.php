<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Locale
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
        // Get locale data on session and set to app's locale default 
        $locale = Session::get('default_locale', config('app.locale'));
    
        // Change app's locale default
        config(['app.locale' => $locale]);

        return $next($request);
    }
}
