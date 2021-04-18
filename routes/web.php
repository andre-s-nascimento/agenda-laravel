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

Route::post('/agenda', [ContatoController::class, 'store'])->name('agenda.store');


Route::get('/', function () {
    return view('welcome');
});
