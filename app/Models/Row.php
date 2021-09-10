<?php

namespace App\Models;

use App\Events\RowCreateEvent;
use App\Events\RowUpdatedEvent;
use Illuminate\Database\Eloquent\Model;

class Row extends Model {
    protected $fillable = ['id', 'name', 'date'];
    protected $dates = ['date'];

    protected static function boot() {
        parent::boot();

        self::created(function(Row $row){
            broadcast(new RowCreateEvent($row));
        });

        self::updated(function(Row $row){
            broadcast(new RowUpdatedEvent($row));
        });
    }
}
