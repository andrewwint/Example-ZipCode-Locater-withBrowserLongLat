<?php

namespace App\Events;

use App\Agent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UploadAgentBookings
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $agent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
