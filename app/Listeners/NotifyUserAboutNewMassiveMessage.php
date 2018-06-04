<?php

namespace App\Listeners;

use App\User;
use App\Notifications\MassiveMessage;
use App\Events\MassiveMessageCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUserAboutNewMassiveMessage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MassiveMessageCreated  $event
     * @return void
     */
    public function handle(MassiveMessageCreated $event)
    {
        $users = User::whereHas('role', function($query){
            $query->where('name','client');
        })->get();
        
        Notification::send($users, new MassiveMessage($event->MassiveMessage));
    }
}
