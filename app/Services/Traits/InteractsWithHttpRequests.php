<?php

namespace App\Services\Traits;

use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Client\Response;

trait InteractsWithHttpRequests
{
    /**
     * @throws HttpClientException|Throwable
     */
    protected function throwIfResponseIsUnsuccessful(Response $response): void
    {
        throw_if($response->failed(), HttpClientException::class, $response->body(), $response->status());
    }
}
