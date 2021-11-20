<?php

namespace Tests\Unit;

use App\Models\Carro;
use PHPUnit\Framework\TestCase;

class UnitCarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLeilaoIndefinido()
    {
        $car = new Carro();
        $car->construirPlacaChassiCombustivelLugarAnoDescricao("OPX4444","TESTE", "TESTE", "TESTE", "TESTE", "TESTE");

        $this->assertTrue($car->leilao === "Indefinido");
        $this->assertTrue($car->remark === "Indefinido");
        $this->assertTrue($car->descLeilao === "Indefinido");
    }
}
