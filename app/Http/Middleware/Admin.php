<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dd(auth()->user());
        if (auth()->user()->isAdmin == 'yes') {
            return $next($request);
        }
        return redirect('home')->with('error', 'You have not admin access');
    }
}
