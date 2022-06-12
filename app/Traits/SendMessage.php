<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SendMessage
{
    public function sendTextMessage($receiver, $message)
    {
        $url = config('whatsapp.facebook-graph');
        $params = [
            "messaging_product" => "whatsapp",
            "preview_url" => false,
            "recipient_type" => "individual",
            "to" => $receiver,
            "type" => "text",
            "text" => [
                "body" => $message
            ]
        ];
        $headers = [
            "Authorization" => "Bearer " . config('whatsapp.authorization')
        ];

        return Http::withHeaders($headers)->asJson()->post($url, $params);
    }
}
