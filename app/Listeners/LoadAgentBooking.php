<?php

namespace App\Listeners;

use App\Events\UploadAgentBookings;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoadAgentBooking implements ShouldQueue
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
     * @param  UploadAgentBookings  $event
     * @return void
     */
    public function handle(UploadAgentBookings $event)
    {
        $event->agent->upateBookings();
        $this->delete();
    }
}
