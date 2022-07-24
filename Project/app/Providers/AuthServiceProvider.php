<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Paginator::useBootstrap();
        //  định nghĩaphân quyền gate
        Gate::define('product-viewAll', function ($user) {
         return  $user->hasPermission('product');
        });
        // Gate::define('product-view', [ProductPolicy::class,'view']);

    }
}
