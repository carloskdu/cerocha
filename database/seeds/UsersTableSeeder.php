<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
          'name'=>"connectasolucoes",
          'email'=>"connectasolucoes@connectasolucoes.com.br",
          'password'=>bcrypt("C0n3ct@2020"),
        ];
        if(User::where('email','=',$dados['email'])->count()){
          $usuario = User::where('email','=',$dados['email'])->first();
          $usuario->update($dados);
          echo "Usuario Alterado!";
        }else{
          User::create($dados);
          echo "Usuario Criado!";
        }
    }
}
