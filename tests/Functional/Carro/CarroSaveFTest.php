<?php

namespace Tests\Functional\Carro;

use Tests\TestCase as TestsTestCase;

class CarroSaveFTest extends TestsTestCase
{
    public function testSaveNewCarro()
    {
        $placa = 'OPX4444';
        $descricao = 'test';
        $lugar = 'test';
        $ano = '2018';
        $combustivel = 'FLEX';
        $chassi = '9BD48204FDSBGASX';

        $resp = $this->post('/carros/criar', [
            'placa' =>  $placa,
            'descricao' =>  $descricao,
            'lugar' =>  $lugar,
            'ano' =>  $ano,
            'combustivel' =>  $combustivel,
            'chassi' =>  $chassi
        ]);

       // $this->assertEquals(201, $resp->getStatusCode());
        //$jsonBody = json_decode($resp)['data'];
        $this->assertDatabaseHas('Carros', [
            'placa' =>  $placa,
            'descricao' =>  $descricao,
            'lugar' =>  $lugar,
            'ano' =>  $ano,
            'combustivel' =>  $combustivel,
            'chassi' =>  $chassi
        ]);
    }

}