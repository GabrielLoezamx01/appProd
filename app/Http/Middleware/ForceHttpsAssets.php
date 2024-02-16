<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class ForceHttpsAssets
{
    public function handle($request, Closure $next)
    {
        // Verifica si la solicitud está en HTTPS
        if ($request->secure()) {
            // Modifica la URL base para los activos compilados
            URL::forceScheme('https');
        }

        return $next($request);
    }
}
