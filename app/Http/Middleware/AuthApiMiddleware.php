<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthApiMiddleware
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
        if (session()->get('api_token') == null){
            return redirect()->route('login');
        }
        else{
            $http = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('api_token')])->post(env('API_BASE_URL').'/auth/me');
            if($http->object() == null){
                session()->pull('api_token');
                session()->pull('firstname');
                session()->pull('lastname');
                session()->pull('privileges');
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
