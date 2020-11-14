<?php

namespace App\Listeners;

use App\Events\CustomerUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use \App\Models\Notification;
use Auth;

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
        $notification = new Notification;
        $notification->description = 'Se ha modificado la informacion de un cliente a '.$event->customer->name;
        $notification->user_id = Auth::user()->id;
        $notification->save();

        /*
        $mensaje = "Bienviendido a ".config('app.name');
        $mensaje = "Bienviendido a ".env('APP_NAME');
        */
    }
}
