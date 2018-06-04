<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Notifications\MassiveMessage;


class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required'
        ]);

        $message = Message::create([
            'subject' => $request->subject,
            'sender_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return back()->with('flash', 'Mensaje enviado a todos los clientes');
    }
}
