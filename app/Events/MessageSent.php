<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;
    public $receiver;

    public function __construct($message)
    {
        $this->message = $message;
        $this->sender = $message->sender_id;
        $this->receiver = $message->receiver_id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->receiver);
    }
}

