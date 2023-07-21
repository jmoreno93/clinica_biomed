<?php

namespace App\Http\Responses;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = []): string
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        if (isset($this->secret)) {
            if($this->secret != "")
                $headers['Authorization'] = $this->secret;
        }
        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers , 'verify' => false]);
        return $response->getBody()->getContents();
    }
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequestPaypal($method, $requestUrl, $formParams = [], $headers = []): string
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
    public function performRequestSpecial($method, $requestUrl, $formParams, $headers = []): bool|string
    {
        $formParams = json_encode($formParams);
        $base_uri = $this->baseUri;
        $url = $base_uri.$requestUrl;
        $c = curl_init();
        curl_setopt_array($c, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $formParams,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_SSL_VERIFYPEER => false,
        ));
        $result = curl_exec($c); // Getting jSON result string
        curl_close($c);
        return $result;
    }
}
