<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sistema;

class SistemaController extends Controller
{
  public function index()
  {
    $registros = DB::table('sistemas')
      ->select('id', 'sistema', 'link', 'nivel', 'ativo', 'link_imagem')
      ->orderBy('nivel', 'asc')
      ->paginate(50);

    return view('admin.sistema.index', compact('registros'));
  }

  public function adicionar()
  {
    return view('admin.sistema.adicionar');
  }

  public function salvar(Request $req)
  {
    $dados = $req->all();

    if (isset($dados['ativo'])) {
      $dados['ativo'] = 'S';
    } else {
      $dados['ativo'] = 'N';
    }

    if ($req->hasFile('link_imagem')) {
      $imagem = $req->file('link_imagem');
      $num = rand(1111, 9999);
      $dir = "img/icon_sistema/";
      $ex = $imagem->guessClientExtension();
      $nomeImagem = "sis_" . $num . "." . $ex;
      $imagem->move($dir, $nomeImagem);
      $dados['link_imagem'] = $dir . "/" . $nomeImagem;
    }

    Sistema::create($dados);
    return redirect()->route('admin.sistema');
  }

  public function editar($id)
  {
    $registro = Sistema::find($id);
    return view('admin.sistema.editar', compact('registro'));
  }

  public function atualizar(Request $req, $id)
  {
    $dados = $req->all();
    if (isset($dados['ativo'])) {
      $dados['ativo'] = 'S';
    } else {
      $dados['ativo'] = 'N';
    }
    Sistema::find($id)->update($dados);

    return redirect()->route('admin.sistema');
  }

  public function deletar($id)
  {
    Sistema::find($id)->delete($id);

    return redirect()->route('admin.sistema');
  }
}
