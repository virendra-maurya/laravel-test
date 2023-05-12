<?php

namespace App\Listeners;

use App\Events\ProfileUpdated;
use App\Notifications\ProfileNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProfileUpdateNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProfileUpdated $event): void
    {
        $event->user->notify(new ProfileNotification('Your profile has been updated!'));
    }
}
