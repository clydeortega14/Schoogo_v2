<?php

namespace App\Http\Middleware;

use Closure;

class CheckDetail
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
        $user = $request->user();

        if(is_null($user->firstname) || is_null($user->lastname) || is_null($user->contact) || is_null($user->address)){

            return redirect('/complete-details');
        }
        
        return $next($request);
    }
}
