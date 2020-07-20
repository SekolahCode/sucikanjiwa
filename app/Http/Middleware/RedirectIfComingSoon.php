<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class RedirectIfComingSoon
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (\Request::is("coming-soon") && \App::environment() == 'local')
        //     return redirect('/');
        
        // if (! \Request::is("coming-soon") && carbon::today() < (new Carbon('2021-05-16 00:00:00')) && \App::environment() != 'local')
        //     return redirect('/coming-soon');

        return $next($request);
    }
}
