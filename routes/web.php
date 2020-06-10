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

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

#Route::get('/',function(){
#    return view("welcome");
#});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cadastromenu', ['uses'=>'MenuController@index']);

Route::post('/contato', ['uses'=>'MenuController@criar']);

Route::get('/contato/{id?}',function($id = null){
    return "Contato id = $id";
});

#Route::post('/contato',function(){
#    dd($_POST);
#    return "Contato POST";
#});

Route::put('/contato',function(){

    return "Contato PUT";
});

Route::group(['middleware'=>'auth'],function(){

    /* Classe Parametro */
    Route::get('/admin/parametro',['as'=>'admin.parametro','uses'=>'Admin\ParametroController@index']);
    Route::get('/admin/parametro/adicionar',['as'=>'admin.parametro.adicionar','uses'=>'Admin\ParametroController@adicionar']);
    Route::post('/admin/parametro/salvar',['as'=>'admin.parametro.salvar','uses'=>'Admin\ParametroController@salvar']);
    Route::get('/admin/parametro/editar/{id}',['as'=>'admin.parametro.editar','uses'=>'Admin\ParametroController@editar']);
    Route::put('/admin/parametro/atualizar/{id}',['as'=>'admin.parametro.atualizar','uses'=>'Admin\ParametroController@atualizar']);
    Route::get('/admin/parametro/deletar/{id}',['as'=>'admin.parametro.deletar','uses'=>'Admin\ParametroController@deletar']);

    /* Classe Estado */
    Route::get('/admin/estado',['as'=>'admin.estado','uses'=>'Admin\EstadoController@index']);
    #Route::get('/admin/estado/adicionar',['as'=>'admin.estado.adicionar','uses'=>'Admin\EstadoController@adicionar']);
    #Route::post('/admin/estado/salvar',['as'=>'admin.estado.salvar','uses'=>'Admin\EstadoController@salvar']);
    #Route::get('/admin/estado/editar/{id}',['as'=>'admin.estado.editar','uses'=>'Admin\EstadoController@editar']);
    #Route::put('/admin/estado/atualizar/{id}',['as'=>'admin.estado.atualizar','uses'=>'Admin\EstadoController@atualizar']);
    #Route::get('/admin/estado/deletar/{id}',['as'=>'admin.estado.deletar','uses'=>'Admin\EstadoController@deletar']);

    /* Classe Cidade */
    Route::get('/admin/cidade',['as'=>'admin.cidade','uses'=>'Admin\CidadeController@index']);
    #Route::get('/admin/cidade/adicionar',['as'=>'admin.cidade.adicionar','uses'=>'Admin\CidadeController@adicionar']);
    #Route::post('/admin/cidade/salvar',['as'=>'admin.cidade.salvar','uses'=>'Admin\CidadeController@salvar']);
    #Route::get('/admin/cidade/editar/{id}',['as'=>'admin.cidade.editar','uses'=>'Admin\CidadeController@editar']);
    #Route::put('/admin/cidade/atualizar/{id}',['as'=>'admin.cidade.atualizar','uses'=>'Admin\CidadeController@atualizar']);
    #Route::get('/admin/cidade/deletar/{id}',['as'=>'admin.cidade.deletar','uses'=>'Admin\CidadeController@deletar']);

    /* Classe Sistema */
    Route::get('/admin/sistema',['as'=>'admin.sistema','uses'=>'Admin\SistemaController@index']);
    Route::get('/admin/sistema/adicionar',['as'=>'admin.sistema.adicionar','uses'=>'Admin\SistemaController@adicionar']);
    Route::post('/admin/sistema/salvar',['as'=>'admin.sistema.salvar','uses'=>'Admin\SistemaController@salvar']);
    Route::get('/admin/sistema/editar/{id}',['as'=>'admin.sistema.editar','uses'=>'Admin\SistemaController@editar']);
    Route::put('/admin/sistema/atualizar/{id}',['as'=>'admin.sistema.atualizar','uses'=>'Admin\SistemaController@atualizar']);
    Route::get('/admin/sistema/deletar/{id}',['as'=>'admin.sistema.deletar','uses'=>'Admin\SistemaController@deletar']);

    /* Classe Grupo Acesso */
    Route::get('/admin/grupoacesso',['as'=>'admin.grupoacesso','uses'=>'Admin\GrupoacessoController@index']);
    Route::get('/admin/grupoacesso/adicionar',['as'=>'admin.grupoacesso.adicionar','uses'=>'Admin\GrupoacessoController@adicionar']);
    Route::post('/admin/grupoacesso/salvar',['as'=>'admin.grupoacesso.salvar','uses'=>'Admin\GrupoacessoController@salvar']);
    Route::get('/admin/grupoacesso/editar/{id}',['as'=>'admin.grupoacesso.editar','uses'=>'Admin\GrupoacessoController@editar']);
    Route::put('/admin/grupoacesso/atualizar/{id}',['as'=>'admin.grupoacesso.atualizar','uses'=>'Admin\GrupoacessoController@atualizar']);
    Route::get('/admin/grupoacesso/deletar/{id}',['as'=>'admin.grupoacesso.deletar','uses'=>'Admin\GrupoacessoController@deletar']);

     /* Classe Permissão do Grupo de Acesso */
    Route::get('/admin/permissao',['as'=>'admin.permissao','uses'=>'Admin\PermissaoController@index']);
    Route::post('/admin/permissao/salvar',['as'=>'admin.permissao.salvar','uses'=>'Admin\PermissaoController@salvar']);
    Route::post('/admin/permissao/deletar',['as'=>'admin.permissao.deletar','uses'=>'Admin\PermissaoController@deletar']);

    /* Classe Permissão do Usuario Grupo */
    Route::get('/admin/usuariogrupo',['as'=>'admin.usuariogrupo','uses'=>'Admin\UsuarioGrupoController@index']);
    Route::post('/admin/usuariogrupo/salvar',['as'=>'admin.usuariogrupo.salvar','uses'=>'Admin\UsuarioGrupoController@salvar']);
    Route::post('/admin/usuariogrupo/deletar',['as'=>'admin.usuariogrupo.deletar','uses'=>'Admin\UsuarioGrupoController@deletar']);
    Route::post('/admin/usuariogrupo/consultausuario',['as'=>'admin.usuariogrupo.consultausuario','uses'=>'Admin\UsuarioGrupoController@consultausuario']);



});