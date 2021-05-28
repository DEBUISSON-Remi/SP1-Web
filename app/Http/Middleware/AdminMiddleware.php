<?php

namespace App\Http\Middleware;

use App\Models\Privilege;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if(Privilege::testPrivilege()){
            return $next($request);
        }
        return redirect()->route('home');
    }
}
