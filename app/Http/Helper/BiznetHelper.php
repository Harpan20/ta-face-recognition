<?php

namespace App\Http\Helper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;

class BiznetHelper
{
    public static function identifyface($base64image)
    {
        $response = Http::withHeaders(['Accesstoken' => env('BIZNET_TOKEN')])
            ->post(env('BIZNET_ENDPOINT') . '/risetai/face-api/facegallery/identify-face', [
                'facegallery_id' => env('BIZNET_FG'),
                'trx_id' => env('BIZNET_FR_TRX_ID'),
                'image' => $base64image
            ]);

        return $response->json();
    }

    public static function enrollFace($base64image, $user_id, $user_name)
    {
        $response = Http::withHeaders(['Accesstoken' => env('BIZNET_TOKEN')])
            ->post(env('BIZNET_ENDPOINT') . '/risetai/face-api/facegallery/enroll-face', [
                'user_id' => $user_id,
                'user_name' => $user_name,
                'facegallery_id' => env('BIZNET_FG'),
                'image' => $base64image,
                'trx_id' => env('BIZNET_FR_TRX_ID'),
            ]);

        return $response->json();
    }

    public static function listFaces()
    {
        $client = new Client();
        $headers = [
            'Accept' => 'application/json',
            'Accesstoken' => env('BIZNET_TOKEN'),
            'Content-Type' => 'text/plain'
        ];
        $body = json_encode([
            "facegallery_id" => env('BIZNET_FG'),
            "trx_id" => env('BIZNET_FR_TRX_ID')
        ]);
        $request = new Request(
            'GET',
            env('BIZNET_ENDPOINT') . '/risetai/face-api/facegallery/list-faces',
            $headers,
            $body
        );

        $error = collect(['risetai' => ['status' => 999]]);

        try {
            $res = $client->sendAsync($request)->wait();

            return json_decode($res->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            return $error;
        }
    }

    public static function deleteFace($user_id)
    {
        $response = Http::withHeaders(['Accesstoken' => env('BIZNET_TOKEN')])
            ->delete(env('BIZNET_ENDPOINT') . '/risetai/face-api/facegallery/delete-face', [
                'user_id' => $user_id,
                'facegallery_id' => env('BIZNET_FG'),
                'trx_id' => env('BIZNET_FR_TRX_ID'),
            ]);

        return $response->json();
    }
}
