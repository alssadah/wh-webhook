<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
//        log::debug('hello');
//        return '';
        // Log::warning(\request()->all());

        $text_body = \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        $receiver = \request()->all()['entry'][0]['changes'][0]['value']['messages'][0]['from'];
//        $text_body="هذي ثالث رساله مني";
//        $receiver="967770540240";
//        $commands=CommandText::select('content','command_id','lang')->Active()->get();
        Client::insert(['number'=>$receiver,'message'=>$text_body]);

        $commands=Command::select('command_name','command_reply','strict','lang')->Active()->get();

        foreach ($commands as $command )
        {
            if(strtolower($text_body)==$command['command_name'] || str_contains(strtolower($text_body),$command['command_name']))
            {
                $getCommand=Command::select('command_reply','strict')->where('command_name',$command['command_name'])
                    ->get();
                log::debug($getCommand[0]['strict']);

                    $getReply=$getCommand[0]['strict']=='1' && strtolower($text_body)==$command['command_name']
                        ?   $getCommand[0]['command_reply']:($getCommand[0]['strict']=='0'&&str_contains(strtolower($text_body),$command['command_name'])
                        ? $getCommand[0]['command_reply']:'');

                log::emergency($getReply);

//           return  $getReply!=''? $this->sendTextMessage($receiver, $getReply) :'';
//                return $this->sendTextMessage($receiver, $getReply);

            }
    log::info('command unknown ');
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
