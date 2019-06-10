<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class Reseller
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
    //     if ($request->user() && $request->user()->is_admin != 0)
    //     {
    //         // return new Response(view('unauthorized')->with('role', 'ADMIN'));
    //         abort(403);
    //     }
        // return $next($request);
    }
}
