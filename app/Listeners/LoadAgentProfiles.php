<?php

namespace App\Listeners;

use App\Events\UploadProfilesFile;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LoadAgentProfiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 3000;
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
     * @param  UploadProfilesFile  $event
     * @return void
     */
    public function handle(UploadProfilesFile $event)
    {
        $event->agent->loadExcel();
        $this->delete();
    }
}
