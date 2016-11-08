<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class YouthUser
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
        $user = Sentinel::getUser();
        $youth = Sentinel::findRoleByName('Youths');

        if (!$user->inRole($youth)) {
            return redirect('fail');
        }
        return $next($request);
    }
}
