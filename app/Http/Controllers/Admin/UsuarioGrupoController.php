<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sistema;
use App\Grupoacesso;
use App\User;
use App\Permissao;
use App\UsuarioGrupo;

class UsuarioGrupoController extends Controller
{
    public function index(){
        $reg_sistemas = DB::table('sistemas')->select('id','sistema', 'link', 'nivel', 'ativo', 'link_imagem')->get();

        $reg_grupoacessos = DB::table('grupoacessos')->get();

        $reg_users = DB::table('users')->select('id','name','email')->get();

        foreach($reg_sistemas as $reg_sistema) {    

            foreach($reg_grupoacessos as $reg_grupoacesso){
                 
              $reg_permissoes = DB::table('permissaos')->where('sistema_id', '=', $reg_sistema->id)
                  ->Where('grupo_id', '=', $reg_grupoacesso->id)
                    ->get();

              $reg_permissoes = json_decode(json_encode($reg_permissoes), true);  

              if (count($reg_permissoes)<=0){
                 $statuspermissao[$reg_sistema->id][$reg_grupoacesso->id] = '';
              } else {
                 $statuspermissao[$reg_sistema->id][$reg_grupoacesso->id] =  $reg_permissoes[0]['id'];
              }
            }
        }

        return view('admin.usuariogrupo.index', compact('reg_grupoacessos', 'reg_sistemas', 'reg_users', 'statuspermissao'));
        
    }

    public function consultausuario(Request $req){
      
      $dados = $req->all();

      $reg_grupoacessos = DB::table('grupoacessos')->get();

      foreach($reg_grupoacessos as $reg_grupoacesso){

        $reg_permissoes = DB::table('usuariogrupos')->where('user_id', '=',$dados['usuario_id'])
                  ->Where('grupo_id', '=', $reg_grupoacesso->id)
                    ->get();

              $reg_permissoes = json_decode(json_encode($reg_permissoes), true);  

              if (count($reg_permissoes)<=0){
                 $statuspermissao['user'][$reg_grupoacesso->id] = '';
              } else {
                 $statuspermissao['user'][$reg_grupoacesso->id] =  $reg_permissoes[0]['id'];
              }
      }
        return response()->json(['success'=>'Inserido com Sucesso', 'status' => $statuspermissao]);
        
    }


    public function salvar(Request $req)
    {
      $dados = $req->all();
      UsuarioGrupo::create($dados);
      return response()->json(['success'=>'Inserido com Sucesso']);    
    }

    public function deletar(Request $req)
    {
      $dados = $req->all();
      UsuarioGrupo::find($dados['id_usrgrp'])->delete($dados['id_usrgrp']);
      return response()->json(['success'=>$dados['id_usrgrp']]);   

    }
}
