<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        return view('NotificationsViews.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
        ]);
    }

    public function show($message_id, $notification_id)
    {
        $notification = DatabaseNotification::findOrFail($notification_id);

        if(auth()->id() === $notification->notifiable_id)
        {
            $message = Message::findOrFail($message_id);
            $notification->markAsRead();
            return view('NotificationsViews.show', compact('message', 'notification'));
        }else{
            return abort(403);
        }
    }
    
    public function read($id)
    {
        $notification = DatabaseNotification::findOrFail($id);

        if(auth()->id() === $notification->notifiable_id)
        {
            $notification->markAsRead();
            return back()->with('info', 'Notificación marcada como leída');        
        }else{
            return abort(403);
        }
    }

    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        if(auth()->id() === $notification->notifiable_id)
        {
            $notification->delete();
            return redirect('notifications')->with('delete', 'Notificación eliminada');        
        }else{
            return abort(403);
        }
    }
}
