<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use Config;

class Locale
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
        $lang = Session::get('Language', Config::get('app.locale'));
        App::setLocale($lang);
        return $next($request);
    }
}
