<?php

namespace App\Listeners;

use App\Events\UpdateAgent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAccountUpdateNotification
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
     * @param  UpdateAgent  $event
     * @return void
     */
    public function handle(UpdateAgent $event)
    {
        //
    }
}
