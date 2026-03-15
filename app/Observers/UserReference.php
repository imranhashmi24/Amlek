<?php

namespace App\Observers;

use App\Models\User;

class UserReference
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $user->ref = 'REF' .$user->created_at->format('Y') . $user->id;
        $user->save();
    }

}
