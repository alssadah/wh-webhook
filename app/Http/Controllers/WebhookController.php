<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function receivedTextMessage()
    {
        Log::info(\request()->all());
        return response()->json('AlaToken');
        return \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        return \request()->all()['entry'][0]['changes'][0]['value']['contacts'];

        return response()->json('hay');
    }
}
