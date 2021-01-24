<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Closure;

class SetLocale
{

    const DEFAULT_LOCALE = 'en';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$responce = $next($request);
    

        // if (Session::has('local')) {
        //     dd($request->get('lang'));
        //     App::setLocale($request->session()->get('local'));
        // }
        //dd($locale);
    
            
            $locale = session()->get('local') ?? static::DEFAULT_LOCALE;
            //dump(session()->all());
            App::setLocale($locale);

 
        //dd($responce); 

        //return $responce;
        return $next($request);
    }
}
