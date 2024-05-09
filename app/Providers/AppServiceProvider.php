<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
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

        //Truyền toàn cục (global)
        view()->composer('*', function ($view) {
            $cats_home = Category::orderBy('name', 'ASC')->get();
            $userId = auth()->id();
            $total_cart_records = Cart::where('user_id', $userId)->count();
            $cart_home = Cart::where('user_id', $userId)->first();
            // Tạo một đối tượng cart của Cart với giá trị null
            $item = new Cart();
            $view->with(compact('cats_home', ['cart_home', 'total_cart_records', 'item']));
        });
    }
}
Paginator::useBootstrap();
