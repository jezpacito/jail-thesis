<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class HandleRoles
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
        $user  =User::where('id',auth()->user()->id)->first();

        if( $user->hasRole('guest')){
            return redirect('/');
        }else{
            return $next($request);
        }
    }
}
