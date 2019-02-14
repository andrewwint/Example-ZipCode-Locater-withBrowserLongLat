<?php

namespace App\Mail;

use App\Agent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AgentProfileAccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The agent instance.
     *
     * @var Agent
     */
    public $agent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.agent.getaccess');
    }
}
