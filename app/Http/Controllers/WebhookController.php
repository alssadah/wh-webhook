<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    // A webhook delivers data to other applications as it happens, meaning you get data immediately. Unlike typical APIs where you would need to poll
    public function receivedTextMessage()
    {
        Log::info(\request()->all());
        return response()->json((int)\request()->hub_challenge, 200);
        return \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        return \request()->all()['entry'][0]['changes'][0]['value']['contacts'];

        return response()->json('hay');
    }

    public function verifyToken()
    {
        /**
         * UPDATE YOUR VERIFY TOKEN
         *This will be to Verify Token value when you set up webhook
         **/
        $verify_token = env('VERIFY_TOKEN', 'alaToken');

        // Parse params from the webhook verification request
        $mode = \request("hub")["mode"];
        $token = \request("hub")["verify_token"];
        $challenge = \request("hub")["challenge"];

        // Check if a token and mode were sent
        if ($mode && $token) {
            // Check the mode and token sent are correct
            if ($mode === "subscribe" && $token === $verify_token) {
                // Respond with 200 OK and challenge token from the request
                Log::debug("WEBHOOK_VERIFIED");
                Log::debug($challenge);
                Log::debug("WEBHOOK_VERIFIED");
                return response()->json((int)\request()->hub_challenge, 200);
            } else {
                // Responds with '403 Forbidden' if verify tokens do not match
                return response()->json('', 403);
            }
        }
    }
}
