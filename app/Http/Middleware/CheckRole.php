<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\OrderController;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    if ($userRole == 0) {
                        return $next($request);
                    }
                    break;
                
                case 'user':
                    if ($userRole == 1) {
                        return $next($request);
                    }
                    break;
            }
            
            switch ($userRole) {
                case 0:
                    return redirect()->route('admin-dashboard');
                case 1:
                    return redirect()->route('dashboard');
        }         
        abort(403);
        }
    
        return $next($request);
    }
}
