<?php

namespace ViralMS\AuthApiGateway\Traits;

use ViralMS\AuthApiGateway\Services\BaseAPIServices;

trait ConsumesExternalService
{
    protected $baseService;

    public function __construct(BaseAPIServices $baseService)
    {
        $this->baseService = $baseService;
    }

    public function performRequest($baseUri, $method, $requestUrl, $formParams = [], $queryParams = [], $headers = [])
    {
        $data = array_merge($formParams, $queryParams);
        $response = $this->baseService->callAPI($baseUri . $requestUrl, $method, $headers, $data);
        return json_encode($response);
    }
}
