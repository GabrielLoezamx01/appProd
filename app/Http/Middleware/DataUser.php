<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DataUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DataUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!DataUsers::where('user_id', $user->id)->exists()) {
                return  Redirect('perfil');
            }
        }

        return $next($request);
    }
}
