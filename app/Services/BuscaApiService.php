<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BuscaApiService
{
    private string $key;
    private string $baseUrl;

    public function __construct(
        Client $client
    )
    {
        $this->key = env('API_KEY') ;
        $this->baseUrl = env('BASE_API_URL');
        $this->client = $client;
    }

    public function get(string $placa): array
    {
        $uri = $this->baseUrl . "/CheckBrazil%20";

        try {
            $response = $this->client->get($uri, [
                'query' => [
                    'RegistrationNumber' => $placa,
                    'username' => $this->key
                ]
            ]);
            $xml = simplexml_load_string($response->getBody()->getContents());
            $strJson = $xml->vehicleJson;
    
            return json_decode($strJson, true);

        } catch (RequestException $exception) {
            return [
                'error' => $exception->getMessage()
            ];
        }
    }



}
