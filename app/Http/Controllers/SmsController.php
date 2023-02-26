<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class SmsController extends Controller
{
    public function sendSms($receiver, $message)
    {
        $client = new Client();
        $data = array(
            "sender"     => env("INTOUCH_SENDER"),
            "recipients" => $receiver,
            "message"    => $message,
        );
        $url = env("INTOUCH_API");
        $response = $client->request('POST', $url, [
            'auth' => [env("INTOUCH_USERNAME"), env("INTOUCH_PASSWORD")],
            'form_params' => $data,
            'verify' => false,
        ]);

        $result = $response->getBody()->getContents();
        $httpcode = $response->getStatusCode();
        if ($httpcode != 200) {
            # code...
            return $httpcode . 'SMS system error ,SMS not send';
            exit;
        } else {
            return $result;
        }
    }
}
