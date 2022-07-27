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
        $user=Auth::user();
        $categories= Category::paginate(5);
        $products_home = Product::all();
        $product_new=Product::latest()->first();
        View::share([
        'user'=> $user,
        'categories'=>$categories,
        'products_home' =>$products_home,
        'product_new' =>$product_new
    ]);
    }
}