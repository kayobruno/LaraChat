<?php

namespace App\Events;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;

    /**
     * Create the event listener.
     *
     * @param $message
     * @param User $user
     */
    public function __construct($message, User $user)
    {
        $this->message = $message;
        $this->user = $user->name;
        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //
    }

    /**
     * @inheritDoc
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
