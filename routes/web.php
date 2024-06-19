<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\carrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::resource('produtos',ProdutoController::class);
Route::resource('users',UserController::class);

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [carrinhoController::class, 'carrinhoList'])->name('site.carrinho');
Route::post('/carrinho', [carrinhoController::class, 'adicionaCarrinho'])->name('site.addCarrinho');
Route::post('/remover', [carrinhoController::class, 'removeCarrinho'])->name('site.removeCarrinho');
Route::post('/atualizar', [carrinhoController::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');
Route::get('/limpar', [carrinhoController::class, 'limparCarrinho'])->name('site.limparCarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
