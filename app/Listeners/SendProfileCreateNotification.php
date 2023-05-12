<?php

namespace App\Listeners;

use App\Events\ProfileCreated;
use App\Notifications\ProfileNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProfileCreateNotification
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
    public function handle(ProfileCreated $event): void
    {
        $event->user->notify(new ProfileNotification('Your profile has been created!'));
    }
}
