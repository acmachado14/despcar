<?php

require __DIR__.'/auth.php';
use App\Http\Controllers\CarroController;
use App\Http\Controllers\DebitoController;
use App\Http\Controllers\PdfControllerOld;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --------------------------------- carros ---------------------------------------

Route::get('/', [CarroController::class, 'index'])->name('index'); //->middleware('auth');

Route::post('/carros/consulta', [CarroController::class, 'consult'])->name('consult');

Route::get('/carros/show/{id}', [CarroController::class, 'show'])->name('show');

Route::post('/carros/edit/{id}', [CarroController::class, 'update']);

Route::get('/carros/edit/{id}', [CarroController::class, 'edit'])->name('edit');

Route::post('/carros/criar', [CarroController::class, 'store']);

Route::get('/carros/criar', [CarroController::class, 'create'])->name('form_criar_carro');

Route::delete('/carros/{id}', [CarroController::class, 'destroy']);
    
Route::get('/carros/pdf/{id}/{tipoConsulta}', [PdfControllerOld::class, 'FormGerarPdf'])->name('FormPDF');

Route::post('/carros/pdf/{id}', [PdfControllerOld::class, 'GerarPDF']);


// --------------------------------- debitos -------------------------------------

Route::post('/debitos/criar', [DebitoController::class, 'store']);

Route::get('/debitos/criar', [DebitoController::class, 'create'])->name('debitos');

Route::delete('/debitos/{id}', [DebitoController::class, 'destroy']);

Route::post('/debitos/edit/{id}', [DebitoController::class, 'update']);

Route::get('/debitos/edit/{id}', [DebitoController::class, 'edit'])->name('edit');


Route::get('create-pdf-file', [PDFController::class, 'index']);