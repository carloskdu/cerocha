<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable = [
      'sistema', 'link', 'nivel', 'ativo', 'link_imagem'
  ];
}
