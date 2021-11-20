<?php

namespace App\Http\Controllers;

use App\Models\Debito;
use App\Models\Carro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DebitoController extends Controller
{
    public function index(Request $request)
    {

        $debitos = Debito::all();
        $mensagem = $request->session()->get('mensagem');

        return view('debitos.index', compact('debitos', 'mensagem'));
    }

    public function create(Request $request)
    {
        $carros = Carro::all();
        return view('debitos.create', compact('carros'));
    }


    public function store(Request $request)
    {

        DB::beginTransaction();
        $debtio = Debito::create([
            'tipo' =>  $request->tipo,
            'descricao' =>  $request->descricao,
            'valor' =>  $request->valor,
            'cdCarro' =>  $request->cdCarro
        ]);

        DB::commit();

        $id = $request->cdCarro;
        $carro = Carro::find($id);

        $request->session()
            ->flash(
                'mensagem',
                "Debito {$debtio->descricao} do carro: {$carro->descricao} criado com sucesso"
            );

        return redirect()->route('show', $id);
        //return view('carros.show', compact('carro'));
    }


    public function edit(Request $request)
    {

        $debitoId = $request->id;

        $debito = Debito::find($debitoId);
        $carro = Carro::find($debito->cdCarro);


        return view('debitos.edit', compact('debito', 'carro'));
    }

    public function update(Request $request)
    {
        $debito = Debito::find($request->cdDebito);

       // var_dump($request->cdDebito);die();
        $debito->tipo = $request->tipo;
        $debito->descricao = $request->descricao;
        $debito->valor = $request->valor;
        $debito->save();

        $id = $request->cdCarro;

        $request->session()
            ->flash(
                'mensagem',
                "Debito {$debito->descricao} editado com sucesso"
            );

        return redirect()->route('show', $id);
    }


    public function destroy(Request $request)
    {
        $debitoId = $request->id;
        $debitoHelper = Debito::find($debitoId);
        $carroId = $debitoHelper->cdCarro;

        DB::transaction(function () use ($debitoId) {
            $debito = Debito::find($debitoId);

            $debito->delete();
        });

        $request->session()
            ->flash(
                'mensagem',
                "Debito {$debitoHelper->descricao} removido com sucesso"
            );

        return redirect()->route('show', $carroId);
    }
}
