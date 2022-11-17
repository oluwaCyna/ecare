<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Message;
use App\Models\Nurse;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage($user_id)
    {
        // dd(User::where('id', $user_id)->first());
        $sender_id = Auth::user()->id;
        $recipient_id = $user_id;
        $sender_role = Auth::user()->role;
        $recipient_role = User::where('id', $user_id)->first()->role;

        switch ($sender_role) {
            case 'doctor':
                $sender = Doctor::where('user_id', $sender_id)->first();
                break;
            case 'nurse':
                $sender = Nurse::where('user_id', $sender_id)->first();
                break;
            case 'laboratory':
                $sender = Laboratory::where('user_id', $sender_id)->first();
                break;
            case 'pharmacy':
                $sender = Pharmacy::where('user_id', $sender_id)->first();
                break;
        
            default:
                break;
        }

        switch ($recipient_role) {
            case 'doctor':
                $recipient = Doctor::where('user_id', $recipient_id)->first();
                break;
            case 'nurse':
                $recipient = Nurse::where('user_id', $recipient_id)->first();
                break;
            case 'laboratory':
                $recipient = Laboratory::where('user_id', $recipient_id)->first();
                break;
            case 'pharmacy':
                $recipient = Pharmacy::where('user_id', $recipient_id)->first();
                break;
        
            default:
                break;
        }

        $sender_messages = Message::where('sender_id', $sender_id)->where('recipient_id', $recipient_id)->get();
        $recipient_messages = Message::where('sender_id', $recipient_id)->where('recipient_id', $sender_id)->get();
        $message = $sender_messages->merge($recipient_messages);
        $message = $message->sortBy('id');
        return view('message', compact(['message', 'sender', 'recipient']));
    }

    public function saveMessage(Request $request)
    {
        Message::create([
            'sender_id' => $request->sender_id,
            'recipient_id' => $request->recipient_id,
            'message' => $request->message
        ]);
        return redirect()->back()->with('success', 'sent');
    }

    public function sendNotification()
    {
        event(new MessageNotification('New Message'));        
    }
}
