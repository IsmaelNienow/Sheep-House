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

    //Rota para cadastrar e visualizar Ovelhas
    Route::get('/cadastroovelha', 'CadastroOvelhasController@index')->name('app.cadastroovelha');
    Route::post('/cadastroovelha/listar', 'CadastroOvelhasController@listar')->name('app.cadastroovelha.listar');
    Route::get('/cadastroovelha/listar', 'CadastroOvelhasController@listar')->name('app.cadastroovelha.listar');
    Route::get('/cadastroovelha/adicionar', 'CadastroOvelhasController@adicionar')->name('app.cadastroovelha.adicionar');
    Route::post('/cadastroovelha/adicionar', 'CadastroOvelhasController@adicionar')->name('app.cadastroovelha.adicionar');
    Route::get('/cadastroovelha/editar/{id}/{msg?}', 'CadastroOvelhasController@editar')->name('app.cadastroovelha.editar');
    Route::get('/cadastroovelha/excluir/{id}', 'CadastroOvelhasController@excluir')->name('app.cadastroovelha.excluir');
  
    //Rota para lista de ovelhas para abate
    Route::get('/abate', 'AbateController@abatelista')->name('app.ovelhas.abate');
    Route::post('/abate/listarAbate', 'AbateController@abatelista')->name('app.ovelhas.listarAbate');
    Route::get('/abate/listarAbate', 'AbateController@abatelista')->name('app.ovelhas.listarAbate');

    //Rota para lista de Ovelhas abatidas
    Route::get('/abatido','AbatidaController@abatidalista')->name('app.ovelhas.abatido');
    Route::post('/abatido/listarAbatida', 'AbatidaController@abatidalista')->name('app.ovelhas.listarAbatida');
    Route::get('/abatido/listarAbatida', 'AbatidaController@abatidalista')->name('app.ovelhas.listarAbatida');

    //Listar Ovelhas Doentes
    Route::get('/alaveterinaria','AlaVeterinariaController@doentelista')->name('app.ovelhas.alaveterinaria');
    Route::post('/alaveterinaria/listarDoente', 'AlaVeterinariaController@doentelista')->name('app.ovelhas.listarDoente');
    Route::get('/alaveterinaria/listarDoente', 'AlaVeterinariaController@doentelista')->name('app.ovelhas.listarDoente');

    //Rota cadastrar e listar Sintomas
    Route::get('/sintoma','SintomaController@sintomalista')->name('app.ovelhas.sintoma');
    Route::get('/sintoma/adicionarSintoma/{id}', 'SintomaController@adicionarsintoma')->name('app.ovelhas.adicionarSintoma');
    Route::post('/sintoma/adicionarSintoma/{id}', 'SintomaController@adicionarsintoma')->name('app.ovelhas.adicionarSintoma'); 
    Route::post('/sintoma/listarSintoma/{id}', 'SintomaController@sintomalista')->name('app.ovelhas.listarSintoma');
    Route::get('/sintoma/listarSintoma/{id}', 'SintomaController@sintomalista')->name('app.ovelhas.listarSintoma');
    Route::get('/sintoma/editarSintoma/{id}', 'SintomaController@editarsintoma')->name('app.ovelhas.editarSintoma');
    Route::get('/sintoma/excluirSintoma/{id}', 'SintomaController@excluirsintoma')->name('app.ovelhas.excluirSintoma');
    
 
    });

    Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir a pagina Inicial!!';
});






        