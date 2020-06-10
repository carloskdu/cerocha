<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Grupoacesso;
class GrupoacessoController extends Controller
{
    public function index(){
        $registros = DB::table('grupoacessos')->paginate(15);
        return view('admin.grupoacesso.index', compact('registros'));
    }

    public function adicionar()
    {
      return view('admin.grupoacesso.adicionar');
    }

    public function salvar(Request $req)
    {
      $dados = $req->all();
      Grupoacesso::create($dados);

      return redirect()->route('admin.grupoacesso');

    }

public function editar($id)
    {
      $registro = Grupoacesso::find($id);
      return view('admin.grupoacesso.editar',compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();
      Grupoacesso::find($id)->update($dados);
      return redirect()->route('admin.grupoacesso');

    }

     public function deletar($id)
    {
      Grupoacesso::find($id)->delete($id);
      return redirect()->route('admin.grupoacesso');

    }
}
