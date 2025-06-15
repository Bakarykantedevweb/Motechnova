<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotEtudiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('etudiant')->check()) {
            // 👉 On stocke l'URL avant redirection vers login
            session()->put('url.intended', $request->fullUrl());
            toastr()->info("Vous devez etre connecte pour acceder a cette page");
            return redirect('etudiant/login'); // ou juste 'etudiant/login'
        }
        return $next($request);
    }
}
