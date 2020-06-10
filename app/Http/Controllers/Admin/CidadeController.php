<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cidade;

class CidadeController extends Controller
{
     public function index(){
        $registros = DB::table('cidades')
            ->join('estados', 'cidades.id_estado', '=', 'estados.id')            
            ->select('cidades.id', 'estados.nome_estado','cidades.id_municipio', 'cidades.nome_municipio as nome_municipio')
            ->paginate(50);
        return view('admin.cidade.index', compact('registros'));
    }

    

    public function adicionar()
    {
      return view('admin.cidade.adicionar');
    }
}
