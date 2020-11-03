<?php

namespace App\Listeners;

use App\Events\UserUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class ControlUserUpdated
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserUpdated $event)
    {
        //dd($event->request);
        $file=$event->request->file('profile_image');
        if($file){
            $name=time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/img/profile_image', $name);

            User::where('id', $event->user->id)->update([
                'profile_image' => $name
            ]);
        }
    }
}
