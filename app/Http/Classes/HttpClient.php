<?php

namespace App\Http\Classes;
use GuzzleHttp\Client;

use Illuminate\Database\Eloquent\Model;

class HttpClient
{
    public function __construct(){

        $this->HttpClient = new Client();

    }

    public function http_client($method, $url, $param, $query = [], $headers = [])
    {
        $response = $this->HttpClient->request($method, $url, $param, [
            'query' => $query,
            'headers' => $headers
        ]);

        // if( !$response->clientError() ) {
        // $response = json_decode($response->getBody()->getContents(), true);
        // }else {
        //     $response = $response->clientError();
        // }


        return response()->json($response);
    }
}
