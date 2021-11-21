<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use App\Models\Debito;
use Illuminate\Support\Facades\DB;

class CarroController extends Controller
{
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

        $httpCarro = new HttpCarroController($request->placa);

        $json = $httpCarro->get();

        $requestStore = new Request([
            'placa' =>  $request->placa,
            'descricao' =>  $json->Description,
            'lugar' =>  $json->Location,
            'ano' =>  $json->RegistrationYear,
            'combustivel' =>  $json->Fuel,
            'chassi' =>  $json->Vin
        ]);

        $requestStore->setLaravelSession($request->getSession());

        $this->store($requestStore);
        return redirect()->route('index');
    }

    public function store(Request $request)
    {


        DB::beginTransaction();
        $carro = Carro::create([
            'placa' =>  $request->placa,
            'descricao' =>  $request->descricao,
            'lugar' =>  $request->lugar,
            'ano' =>  $request->ano,
            'combustivel' =>  $request->combustivel,
            'chassi' =>  $request->chassi
        ]);

        DB::commit();

        $request->session()
            ->flash(
                'mensagem',
                "Carro {$carro->descricao} criado com sucesso"
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
