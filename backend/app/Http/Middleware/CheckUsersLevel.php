<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class CheckUsersLevel
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if(!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        if ($user->level =='superadmin') { 
            return $next($request);    
        }

        if ($user->level == 'admin' && ($request->is('users') || $request->is('users/*'))) {
            abort(403, 'Access Denied');
        }
        
        return $next($request);
    }
}
