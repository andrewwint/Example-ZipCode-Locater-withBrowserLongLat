<?php

namespace App\Listeners;

use App\Events\NewAgent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAccountNotification
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
     * @param  NewAgent  $event
     * @return void
     */
    public function handle(NewAgent $event)
    {
        //
    }
}
