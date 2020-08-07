<?php

namespace App\Http\Libraries;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\RequestException;
use http\Exception\RuntimeException;

class VodManager
{
    const FETCH_URL = 'https://mgtechtest.blob.core.windows.net/files/showcase.json';

    /**
     * Get vod items
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getItems()
    {
        $client = new Client();

        try {
            if (Cache::has('vod_items')) {
                return Cache::get('vod_items');
            }

            $response = $client->get(self::FETCH_URL);

            Cache::put('vod_items', $response->getBody()->getContents(), 60);

            return $response->getBody()->getContents();
        } catch (RequestException $exception) {

        }
    }
}
