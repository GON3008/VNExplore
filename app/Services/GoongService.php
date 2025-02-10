<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoongService
{
    protected $api_key;

    public function __construct()
    {
        $this->api_key = config('services.goong.api_key');
    }

    public function autoComplete($keyword): mixed
    {
        $url = "https://rsapi.goong.io/Place/AutoComplete";
        $response = Http::get(url: $url, query: [
            'key' => $this->api_key,
            'input' => $keyword,
        ]);
        return $response->successful() ? $response->json() : ['error' => 'Something went wrong'];
    }
}
