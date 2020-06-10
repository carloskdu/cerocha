<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parametro;
class ParametroController extends Controller
{
    public function index(){
        $registros = DB::table('parametros')->paginate(15);
        return view('admin.parametro.index', compact('registros'));
    }

    public function adicionar()
    {
      return view('admin.parametro.adicionar');
    }

    public function salvar(Request $req)
    {
      $dados = $req->all();
      Parametro::create($dados);

      return redirect()->route('admin.parametro');

    }

public function editar($id)
    {
      $registro = Parametro::find($id);
      return view('admin.parametro.editar',compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();
      Parametro::find($id)->update($dados);
      return redirect()->route('admin.parametro');

    }

     public function deletar($id)
    {
      Parametro::find($id)->delete($id);
      return redirect()->route('admin.parametro');

    }

}
