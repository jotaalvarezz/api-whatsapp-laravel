<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        $to = $request->input('to');
        $message = $request->input('message');

        $twilioSid = config('services.twilio.twilio_sid');
        $twilioToken = config('services.twilio.twilio_auth_token');
        $twilioWhatsAppNumber = config('services.twilio.twilio_whatsapp_number');
        //return $twilioWhatsAppNumber;
        $twilio = new Client($twilioSid, $twilioToken);
        //return $twilio;
        try {
            $twilio->messages->create(
                "whatsapp:$to",
                [
                    'from' => "whatsapp:$twilioWhatsAppNumber",
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante el envío del mensaje
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['success' => true]);
    }
}

