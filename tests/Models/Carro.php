<?php

namespace App\Test\Model;

class Carro
{
    private $cdCarro;
    private $placa;
    private $chassi;
    private $combustivel;
    private $lugar;
    private $ano;
    private $leilao;
    private $remark;
    private $descLeilao;
    private $descricao;


    public function __construct($placa,$chassi, $combustivel, $lugar, $ano,$descricao)
    {
        $this->placa = $placa;
        $this->chassi = $chassi;
        $this->combustivel = $combustivel;
        $this->lugar =$lugar;
        $this->ano = $ano;
        $this->descricao = $descricao;
    }


}