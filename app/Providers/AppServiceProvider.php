<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
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
        view()->composer(['master.main', 'home.cart', 'home.checkout'], function ($view) {
            $user_cart = Cart::where('customer_id', auth()->guard('customer')->id())->first();
            if ($user_cart !== null) {
                $view->with(compact('user_cart'));
            }
        });

        Paginator::useBootstrap();
    }
}
