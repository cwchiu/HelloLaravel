<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LogEvent
{
    use InteractsWithSockets, SerializesModels;

    private $m_msg;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->m_msg = $msg;
    }

    public function getMessage(){
        return $this->m_msg;
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
