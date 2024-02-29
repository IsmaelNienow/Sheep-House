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

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cadastroovelha', 'CadastroOvelhasController@index')->name('app.cadastroovelha');
    Route::get('/alaveterinaria','AlaVeterinariaController@index')->name('app.alaveterinaria');
    Route::get('/abate','AbateController@index')->name('app.abate');
    Route::get('/abatido','AbatidaController@index')->name('app.abatido');
    Route::get('/cadastrosintomadoenca','CadastroSintomaController@index')->name('app.cadastrosintomadoenca');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir a pagina Inicial!!';
});






        