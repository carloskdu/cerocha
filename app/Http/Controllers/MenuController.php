<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return "este é o menu contrrole";
    }

    public function criar(Request $req){
        dd($req->all());
        return "este é o menu contrrole";
    }

}
