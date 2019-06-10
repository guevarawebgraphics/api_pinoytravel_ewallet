<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class Admin
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
        // return $next($request);
        // if(auth()->user()->is_admin == 1){
        //     return $next($request);
        //     }
        //     return redirect('unauthorized')->with('error','You dont have admin access');    
        // dd($request->user()->is_admin);
        if ($request->user() == null) {
            abort(404);
            // redirect('/home');
        }else {
            if ($request->user()->is_admin != 1)
            // if ($request->user() && $request->user()->is_admin != 1)
            {
                // return new Response(view('unauthorized')->with('role', 'ADMIN'));
                abort(403);
            }
            return $next($request);
        }
        
    }
}
