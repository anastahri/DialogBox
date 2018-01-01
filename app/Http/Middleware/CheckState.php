<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckState
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
        if ($request->user() && $request->user()->isActive()) {
            return $next($request);
        }
        Auth::logout();
        abort(401, 'Account Not Active.');
        //Exception handling (To do!)
        //throw new \Exception('Account Not Active');
    }
}
