<?php

namespace App\Providers;

use App\ThirdParty\InventoryClient;
use App\ThirdParty\InventoryFacade;
use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(InventoryFacade::class, function ($app){
            return new InventoryClient();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
