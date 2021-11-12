<?php

require __DIR__.'/auth.php';
use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;

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
    

// --------------------------------- debitos -------------------------------------