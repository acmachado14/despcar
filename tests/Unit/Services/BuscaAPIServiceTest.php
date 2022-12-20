<?php

namespace Tests\Unit\Services;

use App\Services\BuscaApiService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class BuscaApiServiceTest extends TestCase
{
    public function test_deve_realizar_a_consulta()
    {
        // Arrange
        $placa = 'placa123';
        $xml = simplexml_load_file(__DIR__ . '/success_response.xml')->asXML();

        /** @var Client $client */
        $client = $this->createMock(Client::class);

        $response = new Response(200, [], $xml);

        $uri = "http://teste.com/CheckBrazil%20";
        $client->expects($this->once())->method('get')->with(
            $uri,
            [
                'query' => [
                    'RegistrationNumber' => $placa,
                    'username' => 'seilacara'
                ]
            ]
        )->willReturn($response);

        $service = new BuscaApiService($client);

        // Act
        $response = $service->get($placa);

        // Assert
        $this->assertEquals('FIAT Palio 1.0 Fire Flex 4p', $response['Description']);
    }

    public function test_deve_retornar_uma_mensagem_de_erro()
    {
        // Arrange
        $placa = 'placa123';

        /** @var Client $client */
        $client = $this->createMock(Client::class);
        /** @var RequestInterface $request */
        $request = $this->createMock(RequestInterface::class);

        $uri = "http://teste.com/CheckBrazil%20";
        $client->expects($this->once())->method('get')->with(
            $uri,
            [
                'query' => [
                    'RegistrationNumber' => $placa,
                    'username' => 'seilacara'
                ]
            ]
        )->willThrowException(new RequestException('Erro de rede.', $request));

        $service = new BuscaApiService($client);
        // Act
        $response = $service->get($placa);

        // Assert
        $this->assertEquals([
            'error' => 'Erro de rede.'
        ], $response);
    }
}








