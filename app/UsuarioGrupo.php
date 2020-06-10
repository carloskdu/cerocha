<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioGrupo extends Model
{
    protected $table = 'usuariogrupos';
    protected $fillable = [
      'user_id','grupo_id'
  ];
}
