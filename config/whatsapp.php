<?php

return [
    'facebook-graph' => 'https://graph.facebook.com/'.env('WB_API_VERSION', 'v13.0').'/'.env('WB_PHONE_NUMBER_ID').'/messages',
    'verify_token' => env('WB_VERIFY_TOKEN'),
    'authorization' => env('WB_ACCESS_TOKEN')
];
