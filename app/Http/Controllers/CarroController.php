<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use Illuminate\Support\Facades\DB;

class CarroController extends Controller
{
    public function index(Request $request) {

        $carros = Carro::all();
        $mensagem = $request->session()->get('mensagem');

        return view('index', compact('carros', 'mensagem'));
        
    }

    public function create(){
        return view('carros.create');
    }


    public function show(){
        return view('carros.show');
    }
    
    public function consult(Request $request){
       
        $username = 'placaveiculos01';
        $xmlData = file_get_contents("http://www.regcheck.org.uk/api/reg.asmx/CheckBrazil%20?RegistrationNumber=" . $request->placa . "&username=" . $username);
        $xml=simplexml_load_string($xmlData);
        $strJson = $xml->vehicleJson;
        $json = json_decode($strJson);

        $descricao = $json->Description;
        $chassi = $json->Vin;
        $combustivel = $json->Fuel;
        $lugar = $json->Location;
        $ano = $json->RegistrationYear;

        $requestStore = new Request([
            'placa' =>  $request->placa,
            'descricao' =>  $descricao,
            'lugar' =>  $lugar,
            'ano' =>  $ano,
            'combustivel' =>  $combustivel,
            'chassi' =>  $chassi
            ]);

        $requestStore->setLaravelSession($request->getSession());

        $this->store($requestStore);
        return redirect()->route('index');
    }

    public function store(Request $request) {

        
        DB::beginTransaction();
        $carro = Carro::create([
            'placa' =>  $request->placa,
            'descricao' =>  $request->descricao,
            'lugar' =>  $request->placa,
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
        
        DB::transaction(function () use ($carroId, &$nomeSerie) {
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
/*
    public function editaNome(int $id, Request $request)
    {
        $serie = Carro::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }
*/

}

