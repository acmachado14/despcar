<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use App\Models\Debito;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function FormGerarPdf(Request $request)
    {
      $carroId = $request->id;

      $carro = Carro::find($carroId);
      $debitos = Debito::where('cdCarro', $carroId)->get();
      $mensagem = $request->session()->get('mensagem');

      return view('carros.pdf', compact('carro', 'debitos', 'mensagem'));

    }

    public function GerarPDF(Request $request)
    {
      $mpdf = new Mpdf();

      if ($request->tipoPDF == 'chassi') {
      }

      if ($request->tipoPDF == 'completa') {
      }

      if ($request->tipoPDF == 'debito') {
      }

    /*
    $header = $request->header;
    $cdCarro = $request->CdCarro;
    $placa = $request->placa;
    $descricao = $request->descricao;
    $chassi = $request->chassi;
    $combustivel = $request->combustivel;
    $lugar = $request->lugar;
    $ano = $request->ano;
    $leilao = $request->leilao;
    $remark = $request->remark;
    $descLeilao = $request->descLeilao;

    if ($descLeilao != "") {

      $html2 = "
                  <div id='details' class='clearfix'>
                      <div class='arrow back'><div class='inner-arrow'>Descrição do Leilao</div></div>
                  </div>
                  <div>
                      <a>O leilão encontrado tem procedencia de: {$descLeilao}</a>
                  </div>";
    } else {
      $html2 = "";
    }
    $auxLeilao = 0;
    if (isset($leilao)) {
      $auxLeilao = 1;
      $htmlT = "de Leilão";
      $htmlLeilao = "
              <div id='details' class='clearfix'>
                <div id='company'>
                  <div class='arrow back'><div class='inner-arrow'>Leilão</div></div>
                </div>
              </div>
              <div>
                <div id='divi'>
                  <a>Leilão encontrado: </a>
              </div>";

      if ($leilao == "Sim") {
        $htmlLeilao = $htmlLeilao .
          "<div id='img03'>
                            <img  src='../css/sim.png'>
                          </div>";
      } else {
        $htmlLeilao = $htmlLeilao .
          "<div id='img03'>
                            <img  src='../css/nao.png'>
                          </div>";
      }

      $htmlLeilao = $htmlLeilao . "</div>
            <div>
              <div id='divi'>
                <a>Remarqueting encontrado: </a>
            </div>";

      if ($remark == "Sim") {
        $htmlLeilao = $htmlLeilao . "<div id='img04'>
                          <img  src='../css/sim.png'>
                        </div>";
      } else {
        $htmlLeilao = $htmlLeilao . "<div id='img04'>
                          <img  src='../css/nao.png'>
                        </div>";
      }
    }

    $_SESSION["placa"] = $placa;
    $_SESSION["descricao"] = $descricao;
    $_SESSION["chassi"] = $chassi;
    $_SESSION["combustivel"] = $combustivel;
    $_SESSION["lugar"] = $lugar;
    $_SESSION["ano"] = $ano;
    $total = 0;

    $DebitoDAO = new DebitoDAO();
    $debitos = $DebitoDAO->listar_id($cdCarro);
    $hmtlDebito = "";

    if ($debitos != null) {
      $htmlT = "de Debitos";
      $hmtlDebito = " 
              <div id='details' class='clearfix'>
                <div class='arrow back'><div class='inner-arrow'>Debitos</div></div>
              </div>
          
                <table>
                <thead>
                  <tr>
                    <th class='service'>Tipo</th>
                    <th class='desc'>Descrição</th>
                    <th> Valor</th>
                  </tr>
                </thead>
                <tbody>";

      foreach ($debitos as $debito) {
        $hmtlDebito = $hmtlDebito . "
                <tr>
                  <td>{$debito['tipo']}</td>
                  <td>{$debito['descricao']}</td>
                  <td>{$debito['valor']}</td>
                </tr>";

        $total = $total + $debito['valor'];
      }
      $hmtlDebito = $hmtlDebito . " 
              <tr>
                  <td class='grand total'></td>
                  <td class='grand total'>Total</td>
                  <td class='grand total'>{$total}</td>
                </tr>
              </tbody>
            </table>";
    }

    if ($debitos != null && $auxLeilao == 1) {
      $htmlT = "Completa";
    }

    error_reporting(0);
    ini_set('display_errors', 0);
    require_once "../mpdf/mpdf.php";

    $mpdf = new mPDF();
    $mpdf->SetDisplayMode("fullpage");

    $html = "<!DOCTYPE html>
              <html lang='en'>
                <head>
                  <link rel='stylesheet' href='CarroPesquisar.css' media='all' />
                  
                </head>
                <body>
                  <main>
                  <div id='area01'>
                    <img  src='../css/gelinlogoTop.png'>
                  </div>
                    <h1  class='clearfix'> Consulta {$htmlT}: {$_SESSION["placa"]}</h1>
                    <div id='details' class='clearfix'>
                    <div id='company'>
                      <div class='arrow back'><div class='inner-arrow'>Dados do Carrro</div></div>
                    </div>
                  </div>
                    <table>
                      <thead>
                        <tr>
                          <th class='service'>Placa</th>
                          <th class='desc'>Marca/Modelo</th>
                          <th>Chassi</th>
                          <th>Ano</th>
                          <th>Cidade/Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{$_SESSION["placa"]}</td>
                          <td>{$_SESSION["descricao"]}</td>
                          <td>{$_SESSION["chassi"]}</td>
                          <td>{$_SESSION["ano"]}</td>
                          <td>{$_SESSION["lugar"]}</td>
                        </tr>
                      
                      </tbody>
                    </table>";

    $html = $html . $hmtlDebito . $htmlLeilao;

    $html = $html . "
                    </div>";

    $html = $html . $html2;

    $html = $html . "
          
                    <div id='details' class='clearfix'>
                        <div class='arrow back'><div class='inner-arrow'>Observações</div></div>
                    </div>
          
                    <ul>
                      <li>O sistema depende de várias bases de dados para trazer precisão e confiabilidade à suas consultas.</li>
                      <li>Ainda que empregando os melhores esforços, se isenta de qualquer responsabilidade pela eventual não inclusão de algum dado do veículo em razão de atraso ou falta de encaminhamento dos dados em qualquer uma das consultas oferecidas.</li>
                      <li>Não garante a procedência do veículo e que as bases consultadas possuam 100% das informações cadastradas, se limitando a apresentar as informações obtidas nas bases consultadas.</li>
                    </ul>
                    
                  </main>
          
                  <div id='img02'>
                      <img  src='../css/gelinlogo03.png'>
                  </div>
                  <footer>
                  </footer>
                </body>
              </html>";

    $dataEmissao = date("d/m/Y");
    $css = file_get_contents('../css/CarroPesquisar.css');
    $mpdf->WriteHTML($css, 1);
    $mpdf->SetHeader("GelinDespachante |  | Emissão: {$dataEmissao}");
    $mpdf->setFooter("{PAGENO} de {nb}");
    $mpdf->WriteHTML($html, 2);
    ob_clean();
    $mpdf->Output('Consulta.pdf');
    exit();
  */
  } 

  
}
