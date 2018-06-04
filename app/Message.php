<?php

namespace App;

use App\User;
use App\Events\MassiveMessageCreated;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => MassiveMessageCreated::class
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
