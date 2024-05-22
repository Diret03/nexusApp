<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                Log::info('Usuario autenticado: ' . $user->id);

                if ($user && $user->roles->isEmpty()) { // Verificar si el usuario no tiene roles
                    Log::info('Usuario sin rol, redirigiendo a la página de inicio');
                    Auth::logout(); // Cerrar sesión del usuario
                    return redirect('/')->with('info', 'Espere a que el administrador le asigne un rol.');
                }
                Log::info('Usuario con rol, redirigiendo a home');
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
