<?php

namespace TuanHA\AuthApiGateway\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($baseUri, $method, $requestUrl, $formParams = [], $queryParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $baseUri,
        ]);

        $requestParams = [
            'json' => $formParams,
            'query' => $queryParams,
            'headers' => $headers
        ];

        $response = $client->request($method, $requestUrl, $requestParams );

        return $response->getBody()->getContents();
    }
}
