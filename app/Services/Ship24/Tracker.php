<?php

namespace App\Services\Ship24;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Tracker
{
    use InteractsWithHttpRequests;

    protected string $apiKey;

    protected string $uri = 'https://api.ship24.com/public/v1/trackers/';

    public function __construct(Repository $config)
    {
        $this->apiKey = $config->get('services.ship24.key');
    }

    public function track(array $data = []): Response
    {
        return tap(
            Http::acceptJson()
                ->withToken($this->apiKey)
                ->post($this->uri . 'track', $data),
            fn (Response $response) => $this->throwIfResponseIsUnsuccessful($response),
        );
    }
}
