<?php

namespace App\Listeners;

use App\Events\UserSubmitEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserSubmitListener
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
     * @param  \App\Events\UserSubmitEvent  $event
     * @return void
     */
    public function handle(UserSubmitEvent $event)
    {
        //
    }
}
