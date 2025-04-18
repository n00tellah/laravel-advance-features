<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerOrderPlaced;
use App\Events\CustomerPlacedOrder;

class SendCustomerEmail implements ShouldQueue
{
    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($event->order->user->email)->send(new CustomerOrderPlaced($event->order));
    }
}
