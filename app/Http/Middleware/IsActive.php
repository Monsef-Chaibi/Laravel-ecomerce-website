<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user())
        {
            if(Auth::user()->is_block == 0 )
            {
                return $next($request);
            }
            else{
                return redirect('/User/Block');
            }
        }
        else{
            return $next($request);
        }
        
}
}
