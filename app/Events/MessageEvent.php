<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
  private $chatData;
    /**
     * Create a new event instance.
     */
    public function __construct($chatData)
    {
        $this->chatData = $chatData;
                // Log::info('UserStatusEvent created with  ' . $chatData);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

     public function broadcastWith()
{
    return ['chat' => $this->chatData];
}
    public function broadcastAs():string {
        return 'getChatMessage';
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('broadcast-message'),
        ];
    }
}