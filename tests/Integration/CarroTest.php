<?php

namespace Tests\Integration;

use Test\Models\Carro;
use PHPUnit\Framework\TestCase;

class CarroTest extends TestCase
{
    /** @var \PDO */
    private static $pdo;

    public static function setUpBeforeClass(): void
    {
        self::$pdo = new \PDO('sqlite::memory:');
        self::$pdo->exec('
            create table carros_test (
            cdCarro INTEGER primary key AUTOINCREMENT,
            placa TEXT,
            chassi TEXT,
            combustivel TEXT,
            lugar TEXT,
            ano TEXT,
            leilao TEXT,
            remark TEXT,
            descLeilao TEXT,
            descricao TEXT
        );');
    }

    protected function setUp(): void
    {
        self::$pdo->beginTransaction();
    }

    public function testIncercaoDeCarro()
    {
        $carros = self::$pdo->exec("INSERT INTO carros_test (placa,chassi,ano, descricao, lugar, remark, descLeilao, leilao, combustivel) 
        VALUES('teste','teste','teste','teste','teste','teste','teste','teste','teste');");

        $sql = "SELECT * FROM carros_test";
        $carro = self::$pdo->query($sql, \PDO::FETCH_ASSOC);
        $carrinhos = $carro->fetchAll();

        $cont = 0;
        foreach($carrinhos as $carro){
            if ($carro['placa'] === 'teste'){
                $cont = 1;
            }
        }
        
        self::assertEquals(1, $cont);
        self::assertEquals(1, $carros);
    
    }

    public function testSeExisteCarrosComMesmaPlaca(){
        self::$pdo->exec("INSERT INTO carros_test (placa,chassi,ano, descricao, lugar, remark, descLeilao, leilao, combustivel) 
        VALUES('OPX4444','teste','teste','teste','teste','teste','teste','teste','teste');");

        self::$pdo->exec("INSERT INTO carros_test (placa,chassi,ano, descricao, lugar, remark, descLeilao, leilao, combustivel) 
        VALUES('OPX4444','teste','teste','teste','teste','teste','teste','teste','teste');");

        $sql = "SELECT * FROM carros_test WHERE placa='OPX4444' ";

        $carro = self::$pdo->query($sql, \PDO::FETCH_ASSOC);
        $carrinhos = $carro->fetchAll();
        
        $cont = 0;
        foreach($carrinhos as $carro){
            if ($carro['placa'] === 'OPX4444'){
                $cont++;
            }
        }

        self::assertEquals(1, $cont);

    }

    protected function tearDown(): void
    {
        self::$pdo->rollBack();
    }

    /*
    public function carros()
    {
        $carros = new Carro();

        return [
            [
                [$carros]
            ]
        ];
    }*/
}
