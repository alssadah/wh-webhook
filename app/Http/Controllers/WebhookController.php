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
        return response()->json((int) \request()->hub_challenge, 200);
        return \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        return \request()->all()['entry'][0]['changes'][0]['value']['contacts'];

        return response()->json('hay');
    }
}
