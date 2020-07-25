<?php

namespace App\Providers;

use App\Services\Interfaces\UserService;
use App\Services\Interfaces\VoucherService;
use App\Services\UserServiceImpl;
use App\Services\VoucherServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    public $bindings = [
        VoucherService::class => VoucherServiceImpl::class,
        UserService::class => UserServiceImpl::class
    ];


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
        //
    }
}
