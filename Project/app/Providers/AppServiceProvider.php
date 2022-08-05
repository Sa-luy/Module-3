<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $user = Auth::user();
        $categories_home = Category::latest()->paginate(5);
        $products_home = Product::latest()->paginate(5);
        $product_new = Product::latest()->first();
        $carts = session()->get('cart');
        View::share([
            'user' => $user,
            'categories_home' => $categories_home,
            'products_home' => $products_home,
            'carts' => $carts,
            'product_new' => $product_new
        ]);
    }
}
