<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientRole
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
     // dd(Auth::user()->active, Auth::user()->role, $request->id);

        if ( Auth::user()->active === "1" && Auth::user()->role === 'client' && strval(Auth::user()->id)=== $request->id ) {
            
            return $next($request);
        }

        abort(403);
    }
}
