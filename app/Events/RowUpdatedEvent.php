<?php

namespace App\Events;

use App\Models\Row;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class RowUpdatedEvent implements ShouldBroadcast {
    use SerializesModels;

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
        return 'row.updated';
    }

    public function broadcastOn(): Channel {
        return new Channel('rows');
    }
}
