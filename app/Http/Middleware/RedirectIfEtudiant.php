<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfEtudiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('etudiant')->check()) {
            toastr()->info("Vous êtes déjà connecté");
            return redirect("etudiant/dashboard");
        }

        // ✅ Stocke l'URL d'origine si ce n’est pas déjà une page d'auth
        if (!$request->is('etudiant/login') && !$request->is('etudiant/register')) {
            session()->put('url.intended', $request->fullUrl());

        }
        return $next($request);
    }
}
