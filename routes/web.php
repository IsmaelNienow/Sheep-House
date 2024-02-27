<?php

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

Route::get('/', 'PrincipalController@principal')->name('site.index');    
Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login',function(){ return 'login';})->name('site.login');

Route::middleware('autenticacao')->prefix('app')->group(function(){
    Route::get('/cadastroovelhas', 'CadastroOvelhasController@index')->name('app.cadastro');
    Route::get('/alaveterinaria',function(){ return ' Ala Veterinaria';})->name('app.alaveterinaria');
    Route::get('/abate',function(){ return 'Animais para Abate';})->name('app.abates');
    Route::get('/abatidos',function(){ return 'Animais Abatidos';})->name('app.abatidos');
    Route::get('/cadastroSintomasDoenca',function(){ return 'Sintomas';})->name('app.sintomas');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir a pagina Inicial!!';
});






        