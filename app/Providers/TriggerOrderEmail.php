<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\CustomerPlacedOrder;
use App\Listeners\SendCustomerEmail;

class TriggerOrderEmail extends ServiceProvider
{
    protected $listen = [
        CustomerPlacedOrder::class => [
            SendCustomerEmail::class,
        ],
    ];
    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     //
    // }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
