<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class StaffUser
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
        $staff = Sentinel::findRoleByName('Staff');

        if (!$user->inRole($staff)) {
            return redirect('fail');
        }
        return $next($request);
    }
}
