<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;

class MessagesController extends Controller
{
    public function showMessages()
    {
        // $messages = Messages::all();
        $messages = Messages::where('receiver_email', auth()->user()->email)->get();
        return view('messages', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $message = new Messages();
        $message->title = $request->title;
        $message->content = $request->content;
        $message->sender_email = $request->sender_email;
        $message->receiver_email = $request->receiver_email;
        $message->save();
        return redirect()->to('/messages/');
    }
}