<?php

use Illuminate\Database\Seeder;

class SistemastTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [[
          'sistema'=>"Sistema",
          'link'=>"admin.sistema",
          'nivel'=>'1.1'],[
          'sistema'=>"Grupo",
          'link'=>"admin.grupoacesso",
          'nivel'=>'1.2'],[
          'sistema'=>"Permissão",
          'link'=>"admin.permisao",
          'nivel'=>'1.3'],
        ];
          User::create($dados);
          echo "Sistema Criado!";
    }
}
