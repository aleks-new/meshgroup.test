<?php

namespace App\Events;

use App\Models\Row;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RowCreateEvent implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $row;

    public function __construct(Row $row) {
        $this->row = $row;
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs() {
        return 'row.created';
    }

    public function broadcastOn(): Channel {
        return new PresenceChannel('rows');
    }
}
