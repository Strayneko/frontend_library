<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HttpClient
{

    public static function fetch($method = 'POST', $url, $body = [], $files = [])
    {
        // if method is GET, return response with get method
        if (strtoupper($method) == "GET") return Http::get($url)->json();
        if (strtoupper($method) == "DELETE") return Http::delete($url)->json();

        // if there is a file, then client is multipart
        if (sizeof($files) > 0) {
            $client = Http::asMultipart();
            // attach file to client
            foreach ($files as $key => $file) {
                $path = $file->getPathname();
                $name = $file->getClientOriginalName();
                // attach file
                $client->attach($key, file_get_contents($path), $name);
            }

            // fetch api
            return $client->post($url, $body)->json();
        }

        // fetch post
        return Http::post($url, $body)->json();
    }
}
