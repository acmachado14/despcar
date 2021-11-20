<?php

namespace Tests\Models;


class Carro
{
    private $cdCarro;
    private $placa;
    private $chassi;
    private $combustivel;
    private $lugar;
    private $ano;
    private $descricao;
    private $leilao;
    private $remark;
    private $descLeilao;
    

    public function __construct($placa,$chassi, $combustivel, $lugar, $ano,$descricao)
    {
        $this->placa = $placa;
        $this->chassi = $chassi;
        $this->combustivel = $combustivel;
        $this->lugar =$lugar;
        $this->ano = $ano;
        $this->descricao = $descricao;
        $this->remark = "Indefinido";
        $this->descLeilao = "Indefinido";
        $this->leilao = "Indefinido";
    }

    public function getRemark(){
        return $this->remark;
    }

    public function getLeilao(){
        return $this->leilao;
    }

    public function getDescLeilao(){
        return $this->descLeilao;
    }
    
    

}