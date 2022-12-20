<?php

namespace Tests\Integration;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Carro;

class CarroTest extends TestCase
{
    use RefreshDatabase;

    public function testIncercaoDeCarro()
    {

        DB::beginTransaction();
        try{
            $carro = Carro::create([
                'placa' =>  'OPX4444',
                'descricao' =>  'test',
                'lugar' =>  'test',
                'ano' =>  '2018',
                'combustivel' =>  'FLEX',
                'chassi' =>  '9BD48204FDSBGASX',
            ]);
            DB::commit();
        }catch(\Exception $exception) {
            DB::rollback();
        }


        $carro2 = Carro::find($carro->cdCarro);

        self::assertEquals($carro2->cdCarro, $carro->cdCarro);

    }

    public function testSeExisteCarrosComMesmaPlaca(){

        DB::beginTransaction();
        try{
            $carro = Carro::create([
                'placa' =>  'OPX4444',
                'descricao' =>  'test',
                'lugar' =>  'test',
                'ano' =>  '2018',
                'combustivel' =>  'FLEX',
                'chassi' =>  '9BD48204FDSBGASX',
            ]);

            $carro2 = Carro::create([
                'placa' =>  'OPX4444',
                'descricao' =>  'test',
                'lugar' =>  'test',
                'ano' =>  '2018',
                'combustivel' =>  'FLEX',
                'chassi' =>  '9BD48204FDSBGASX',
            ]);

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollback();
        }

        self::assertEquals($carro->placa, $carro2->placa);
    }
}
