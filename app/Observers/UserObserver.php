<?php

namespace App\Observers;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function saving(User $user)
    {
        $slugUser=$user->name." ".time();

        $slug= Str::slug($slugUser, '-');

        $user->slug= $slug;
    }
}
