<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Classified;

class ClassifedWasCreated extends Event
{
    use SerializesModels;
    
    public $classified;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Classified $classified)
    {
        $this->classified = $classified;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
