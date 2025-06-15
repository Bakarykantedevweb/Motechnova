<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         View::composer('layouts.frontend', function ($view) {
            $cartCount = 0;

            if (Auth::guard('etudiant')->check()) {
                $cartCount = Cart::where('etudiant_id', Auth::guard('etudiant')->id())->count();
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
