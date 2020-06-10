<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [
      'id', 'id_estado', 'id_municipio', 'nome_municipio'
  ];
}
