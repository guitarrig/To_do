<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Cookie;
use Lang;

use Closure;

class LanguageSet
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
        if (Cookie::get('locale')) {
            Lang::setLocale(Cookie::get('locale'));
            }
        return $next($request);
    }
}
