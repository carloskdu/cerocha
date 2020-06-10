<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Estado;

class EstadoController extends Controller
{
    public function index(){
        $registros = Estado::paginate(10);
        return view('admin.estado.index', compact('registros'));
    }

    

    public function adicionar()
    {
      return view('admin.estado.adicionar');
    }
}
