<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaginaClienteController;
use App\Http\Controllers\ProdutoController;
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

Route::get('/', [LoginController::class, 'loginPage'])->name('loginPage');
Route::post('/autenticar', [LoginController::class, 'autenticar'])->name('autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrar', [LoginController::class, 'registroPage'])->name('registroPage');
Route::post('/cadastrar', [LoginController::class, 'cadastrar'])->name('cadastrar');

Route::get('/dashboard', [LoginController::class, 'dashboardPage'])->name('dashboardPage');


Route::resource('categoria', CategoriaController::class);
Route::resource('produto', ProdutoController::class);
Route::resource('cliente', ClienteController::class);



Route::get('index', [LoginController::class, 'index'])->name('index');

Route::get('produtos', [PaginaClienteController::class, 'produtos'])->name('produtos-clientes');
Route::post('produtos', [PaginaClienteController::class, 'produtos'])->name('produtos-clientes');
Route::get('resetar', [PaginaClienteController::class, 'resetar'])->name('resetar');


Route::get('carrinho', [PaginaClienteController::class, 'carrinho'])->name('carrinho');