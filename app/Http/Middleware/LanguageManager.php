<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageManager{
    public function handle(Request $request, Closure $next){
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }else{
            App::setLocale('en');
            session()->put('locale', 'en');
        }
        return $next($request);
    }
}
