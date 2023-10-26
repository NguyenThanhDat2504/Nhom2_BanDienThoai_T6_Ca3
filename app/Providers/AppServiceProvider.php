<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        view()->composer('*',function($view) {
            $cartCount = 0;

            if(Auth::user()) $cartCount = Cart::where('user_id', Auth::user()->id)->count();

            $view->with('cartCount', $cartCount);
        });
        // $cart = Cart::where('user_id', session('currentUser')['id'])->count();
        // dd(auth()->user());
    }
}
