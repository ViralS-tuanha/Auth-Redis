<?php


namespace ViralMS\AuthApiGateway\Services;


class BaseAPIServices
{
    public function callAPI($url, $method, $headers, $data = null)
    {
        $defaultHeaders = [
            'Content-Type: application/json',
            'Accept: application/json',
        ];

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array_merge($defaultHeaders, $headers),
        ];

        switch ($method) {
            case "POST":
                $options[CURLOPT_POST] = 1;
                if ($data) {
                    $options[CURLOPT_POSTFIELDS] = json_encode($data);
                }
                break;

            case "GET":
                if ($data) {
                    $options[CURLOPT_POSTFIELDS] = json_encode($data);
                }
                break;

            case "PUT":
                $options[CURLOPT_CUSTOMREQUEST] = 'PUT';
                if ($data) {
                    $options[CURLOPT_POSTFIELDS] = json_encode($data);
                }
                break;
            case "DELETE":
                $options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                if ($data) {
                    $options[CURLOPT_POSTFIELDS] = json_encode($data);
                }
                break;

            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $output = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($output);

        return $response;
    }


}



