<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use App\Http\Resources\ReplyResource;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AddReplyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reply;

    public function __construct($reply)
    {
        $this->reply = new ReplyResource($reply);
    }

    public function broadcastOn()
    {
        return new Channel('addReplyChannel');
    }
}
