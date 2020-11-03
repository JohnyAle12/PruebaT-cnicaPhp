<?php

namespace App\Providers;

use App\Providers\CustomerUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ControlCustomerUpdated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerUpdated  $event
     * @return void
     */
    public function handle(CustomerUpdated $event)
    {
        //
    }
}
