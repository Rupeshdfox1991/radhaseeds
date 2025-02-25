<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckRoles
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
        if (!empty(auth()->user()->role_id)) {
            if (auth()->user()->role_id !== User::ADMIN_ROLE) {
                // User does not have the admin role
                return redirect()->route('admin')->with('warning', 'You do not have permission to access this page.');
            } else {
                // User has the admin role, proceed with the request
                return $next($request);
            }
        } else {
            // User not authenticated or role_id is empty
            return redirect()->route('admin')->with('warning', 'You do not have permission to access this page.');
        }
    }
}

