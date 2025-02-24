<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'name' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to($request->to)->send(new NotificacionMailable($data));

        return response()->json(['message' => 'Email sent successfully'], 200);
    }
}

