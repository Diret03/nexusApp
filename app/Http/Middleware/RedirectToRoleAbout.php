<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectToRoleAbout
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
        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->hasRole('Administrador')) {
            $layout = 'layouts.admin';
        } elseif ($user->hasRole('Gerente')) {
            $layout = 'layouts.manager';
        } elseif ($user->hasRole('Jefe de desarrollo')) {
            $layout = 'layouts.developer';
        } elseif ($user->hasRole('Analista')) {
            $layout = 'layouts.analyst';
        } else {
            $layout = 'layouts.app';
        }

        view()->share('layout', $layout);

        return $next($request);
    }
}
