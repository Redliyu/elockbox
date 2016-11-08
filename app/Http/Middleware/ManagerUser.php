<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class ManagerUser
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
        $manager = Sentinel::findRoleByName('Managers');

        if (!$user->inRole($manager)) {
            return redirect('fail');
        }
        return $next($request);
    }
}
