<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\CommandText;
use App\Traits\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    use SendMessage;
    // A webhook delivers data to other applications as it happens, meaning you get data immediately. Unlike typical APIs where you would need to poll
    public function receivedTextMessage()
    {
        return '';
        // Log::warning(\request()->all());

        $text_body = \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        $receiver = \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['from'];

        $commands=CommandText::select('content','command_id','lang')->Active()->get();
        foreach ($commands as $command )
        {
            if($text_body==$command['content'])
            {
                $getReply=Command::select('command_reply','lang')->where('command_id',$command['command_id'])->where
                ('lang',$command['lang'])->get()->toArray();
//                $getReply=CommandText::find($command['command_id'])->Command['command_reply'];
                return $this->sendTextMessage($receiver, $getReply[0]['command_reply']);

            }

        }
//        return $this->sendTextMessage($receiver, $text_body);
    }

    public function verifyToken()
    {
        Log::alert(\request()->all());
        /**
         * UPDATE YOUR VERIFY TOKEN
         *This will be to Verify Token value when you set up webhook
         **/
        $verify_token = env('VERIFY_TOKEN', 'alaToken');

        // Parse params from the webhook verification request
        $mode = \request()->hub_mode;
        $token = \request()->hub_verify_token;
        $challenge = \request()->hub_challenge;

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
