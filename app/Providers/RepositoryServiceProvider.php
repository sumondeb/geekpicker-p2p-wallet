<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\CurrencyConversionRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\CurrencyConversionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(CurrencyConversionRepositoryInterface::class, CurrencyConversionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
