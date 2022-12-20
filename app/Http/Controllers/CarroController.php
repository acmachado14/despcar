<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use App\Models\Debito;
use Illuminate\Support\Facades\DB;
use App\Services\BuscaApiService;
use GuzzleHttp\Client;

class CarroController extends Controller
{
    private $BuscaApiService;

    public function __construct()
    {
        $this->BuscaApiService = new BuscaApiService(new Client);
    }

    public function index(Request $request)
    {

        $carros = Carro::all();
        $mensagem = $request->session()->get('mensagem');

        return view('index', compact('carros', 'mensagem'));
    }

    public function create()
    {
        return view('carros.create');
    }


    public function show(Request $request)
    {
        $carroId = $request->id;

        $carro = Carro::find($carroId);
        $debitos = Debito::where('cdCarro', $carroId)->get();
        $mensagem = $request->session()->get('mensagem');

        return view('carros.show', compact('carro', 'debitos', 'mensagem'));
    }

    public function edit(Request $request)
    {
        $carroId = $request->id;

        $carro = Carro::find($carroId);
        $debitos = Debito::where('cdCarro', $carroId)->get();

        return view('carros.edit', compact('carro', 'debitos'));
    }

    public function update(Request $request)
    {

        $carro = Carro::find($request->CdCarro);

        $carro->placa = $request->placa;
        $carro->descricao = $request->descricao;
        $carro->lugar = $request->lugar;
        $carro->ano = $request->ano;
        $carro->combustivel = $request->combustivel;
        $carro->chassi = $request->chassi;


        $carro->remark = $request->remark;
        $carro->leilao = $request->leilao;
        $carro->descLeilao = $request->descLeilao;

        $carro->save();

        $request->session()
            ->flash(
                'mensagem',
                "Carro {$carro->descricao} editado com sucesso"
            );

        return redirect()->route('index');
    }


    public function consult(Request $request)
    {
        /** @var Array $carData*/
        $carData = $this->BuscaApiService->get($request->placa);

        $car = [
            'placa' =>  $request->placa,
            'descricao' =>  $carData['Description'],
            'lugar' =>  $carData['Location'],
            'ano' =>  $carData['RegistrationYear'],
            'combustivel' =>  $carData['Fuel'],
            'chassi' =>  $carData['Vin']
        ];

        $car = $this->storeCar($car);

        $request->session()
            ->flash(
                'mensagem',
                "Carro {$car->descricao} criado com sucesso"
            );

        return redirect()->route('index');
    }

    public function storeCar(array $carData): Carro
    {
        $car = Carro::fromArray($carData);

        DB::beginTransaction();
        try {
            $car->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
        }

        return $car;
    }

    public function store(Request $request)
    {
        $car = [
            'placa' =>  $request->placa,
            'descricao' =>  $request->descricao,
            'lugar' =>  $request->lugar,
            'ano' =>  $request->ano,
            'combustivel' =>  $request->combustivel,
            'chassi' =>  $request->chassi
        ];

        $car = $this->storeCar($car);

        $request->session()
            ->flash(
                'mensagem',
                "Carro {$car->descricao} criado com sucesso"
            );

        return redirect()->route('index');
    }

    public function destroy(Request $request)
    {
        $carroId = $request->id;

        DB::transaction(function () use ($carroId) {
            $carro = Carro::find($carroId);
            $carro->delete();
        });

        $request->session()
            ->flash(
                'mensagem',
                "Carro removido com sucesso"
            );
        return redirect()->route('index');
    }

}
