<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        // Agar Paginator menggunakan template bootstrap
        Paginator::useBootstrap();

        // Pagar yang bisa diakses cuma username mario
        Gate::define('admin', function (User $user) {
            return $user->role === 1;
        });
    }
}
