<?php

namespace App\Services\Ship24;

use App\Services\Traits\InteractsWithHttpRequests;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Config\Repository;
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

    public static function fakeResponse(): PromiseInterface
    {
        return Http::response([
            'data' => [
                'trackings' => [
                    [
                        'tracker' => [
                            'trackerId' => '26148317-7502-d3ac-44a9-546d240ac0dd',
                            'trackingNumber' => 'S24DEMO456393',
                            'isSubscribed' => true,
                            'shipmentReference' => 'c6e4fef4-a816-b68f-4024-3b7e4c5a9f81',
                            'createdAt' => '2023-03-30T11 =>30 =>03.860Z',
                        ],
                        'shipment' => [
                            'shipmentId' => 'c062d097-0bd7-4905-8b52-3335b55eade6',
                            'statusCode' => null,
                            'statusCategory' => null,
                            'statusMilestone' => 'pending',
                            'originCountryCode' => 'CN',
                            'destinationCountryCode' => 'US',
                            'delivery' => [
                                'estimatedDeliveryDate' => null,
                                'service' => null,
                                'signedBy' => null,
                            ],
                        ],
                        'trackingNumbers' => [
                            [
                                'tn' => 'S24DEMO456393',
                            ],
                        ],
                        'recipient' => [
                            'name' => null,
                            'address' => null,
                            'postCode' => '94901',
                            'city' => null,
                            'subdivision' => null,
                        ],
                    ],
                    'events' => [],
                    'statistics' => [
                        'timestamps' => [
                            'infoReceivedDatetime' => null,
                            'inTransitDatetime' => null,
                            'outForDeliveryDatetime' => null,
                            'failedAttemptDatetime' => null,
                            'availableForPickupDatetime' => null,
                            'exceptionDatetime' => null,
                            'deliveredDatetime' => null,
                        ],
                    ],
                ],
            ],
        ]);
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
