<?php

use App\Http\Controllers\ContatoController;
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

Route::get('/agenda', [ContatoController::class, 'index'])->name('agenda.index'); //listar

Route::get('/agenda/criar', [ContatoController::class, 'create'])->name('agenda.create'); //criar novo contato
Route::get('/agenda/{id}', [ContatoController::class, 'show'])->name('agenda.show'); //exibir detalhes 

Route::get('/agenda/editar/{id}', [ContatoController::class, 'edit'])->name('agenda.edit'); //exibir form de edição
Route::put('/agenda/{id}', [ContatoController::class, 'update'])->name('agenda.update'); //efetuar a atualização
Route::delete('/agenda/{id}', [ContatoController::class, 'destroy'])->name('agenda.destroy'); // excluir um contato 
Route::post('/agenda', [ContatoController::class, 'store'])->name('agenda.store');


Route::get('/', function () {
    return view('welcome');
});
