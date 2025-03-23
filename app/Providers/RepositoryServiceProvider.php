<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderEvents\OrderEventRepository;
use App\Repositories\OrderEvents\OrderEventRepositoryInterface;
use App\Repositories\OrderItems\OrderItemRepository;
use App\Repositories\OrderItems\OrderItemRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderItemRepositoryInterface::class, OrderItemRepository::class);
        $this->app->bind(OrderEventRepositoryInterface::class, OrderEventRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
