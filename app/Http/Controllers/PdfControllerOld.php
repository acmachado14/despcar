<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Carro;
use App\Models\Debito;
use Illuminate\Support\Facades\DB;

class PdfControllerOld extends Controller
{
    public function FormGerarPdf(Request $request)
    {
        $carroId = $request->id;
        $carro = Carro::find($carroId);
        $debitos = Debito::where('cdCarro', $carroId)->get();
        $mensagem = $request->session()->get('mensagem');
        $data = date('d/m/Y');

        $valorTotal = 0;
        foreach($debitos as $debito){
            $valorTotal += $debito->valor;
        }

        if ($request->tipoConsulta == 0){
            $pdf = PDF::loadView('pdf.debito', compact('carro', 'debitos', 'mensagem', 'valorTotal', 'data'));
            $nomeTipo = "debitos";
        } elseif ($request->tipoConsulta == 1){
            $pdf = PDF::loadView('pdf.leilao', compact('carro', 'debitos', 'mensagem', 'valorTotal', 'data'));
            $nomeTipo = "leilao";
        } elseif ($request->tipoConsulta == 2){
            $pdf = PDF::loadView('pdf.completa', compact('carro', 'debitos', 'mensagem', 'valorTotal', 'data'));
            $nomeTipo = "completa";
        }

        return $pdf->download("{$nomeTipo}-{$carro->placa}.pdf");
    }
}
