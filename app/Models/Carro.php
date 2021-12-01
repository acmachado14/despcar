<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'cdCarro';
    protected $fillable = [
        'placa',
        'descricao',
        'chassi',
        'combustivel',
        'lugar',
        'ano',
        'remark',
        'leilao',
        'descLeilao'
    ];
    
    protected $attributes = [
        'leilao' => 'Indefinido',
        'descLeilao' => 'Indefinido',
        'remark' => 'Indefinido'
    ];

    public function debitos(){
        return $this->hasMany(Debito::class);
    }


    public function construirPlacaChassiCombustivelLugarAnoDescricao($placa,$chassi, $combustivel, $lugar, $ano,$descricao)
    {
        $this->placa = $placa;
        $this->chassi = $chassi;
        $this->combustivel = $combustivel;
        $this->lugar =$lugar;
        $this->ano = $ano;
        $this->descricao = $descricao;
    }

    public static function fromArray(array $data): self
    {
        $car = new self();
        $car->placa = $data['placa'];
        $car->chassi = $data['chassi'];
        $car->combustivel = $data['combustivel'];
        $car->lugar = $data['lugar'];
        $car->ano = $data['ano'];
        $car->descricao = $data['descricao'];
        
        return $car;
    }
    
}

