<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function receivedTextMessage()
    {
        return response()->json('AlaToken');
        return \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        return \request()->all()['entry'][0]['changes'][0]['value']['contacts'];

        return response()->json('hay');
    }
}
