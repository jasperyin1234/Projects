<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ownOrder
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
        // Check if user is authenticated
        if (Auth::check()) {
            $authUserId = $request->user()->id;
            $requestedUserId = $request->route('userid');
            if ($authUserId == $requestedUserId) {
                return $next($request);
            }
        }
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
    //personal checkpoint
}