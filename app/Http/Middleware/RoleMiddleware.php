<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's role is in the provided roles
            $userRole = Auth::user()->role;

            if (in_array($userRole, $roles)) {
                return $next($request);
            }
            return redirect()->route('backend.index');
        }

        // Redirect or respond with an error if the user doesn't have the required role
        return redirect()->route('login');
    }
}
