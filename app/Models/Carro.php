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
        'leilao' => '',
        'descleilao' => '',
        'remark' => '',
    ];

    public function debitos(){
        return $this->hasMany(Debito::class);
    }
}

