<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sistema;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        \Menu::make('Menuprincipal', function ($menu) {


            $reg_sistemas = DB::table('sistemas')
                ->select('id', 'sistema', 'link', 'nivel', 'ativo', 'link_imagem')->get();

            $v_niv1 = $v_niv2 = $v_niv3 = 0;
            foreach ($reg_sistemas as $reg_sistema) {

                //$reg_sistema->id
                //$reg_sistema->sistema
                //$reg_sistema_clr = ereg_replace("[^a-zA-Z0-9_]", "", strtr($reg_sistema->sistema, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
                //$reg_sistema->link
                //$reg_sistema->nivel
                //$reg_sistema->ativo

                $v_nivel = explode(".", $reg_sistema->nivel);
                $v_n1 = isset($v_nivel[0]) ? $v_nivel[0] : "";
                $v_n2 = isset($v_nivel[1]) ? $v_nivel[1] : "";
                $v_n3 = isset($v_nivel[2]) ? $v_nivel[2] : "";
                $v_n4 = isset($v_nivel[3]) ? $v_nivel[3] : "";
                //$reg_sistema_clr = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                if (($v_n1 != '') && ($v_n2 == '') && ($v_n3 == '') && ($v_n4 == '')) {
                    //////////////////////NIVEL 1 //////////////////////
                    $reg_sistema_clr = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                    $menu->add($reg_sistema->sistema, $reg_sistema_clr, ['route' => $reg_sistema->link, 'class' => 'nav-item has-treeview menu-open'])
                        ->prepend(' <i class="nav-icon fas fa-tachometer-alt"></i>')
                        - id($reg_sistema->id);
                } else if (($v_n1 != '') && ($v_n2 != '') && ($v_n3 == '') && ($v_n4 == '')) {
                    //////////////////////NIVEL 1 //////////////////////
                    $reg_sistema_clr2 = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                    $menu->$reg_sistema_clr->add($reg_sistema->sistema, $reg_sistema_clr2, ['route' =>  $reg_sistema->link, 'class' => 'nav-item has-treeview menu-open'])
                        ->prepend(' <i class="fas fa-circle nav-icon"></i>')
                        ->id($reg_sistema->id);
                } else if (($v_n1 != '') && ($v_n2 != '') && ($v_n3 == '') && ($v_n4 == '')) {
                    //////////////////////NIVEL 2 //////////////////////
                    $reg_sistema_clr2 = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                    $menu->$reg_sistema_clr->add($reg_sistema->sistema, $reg_sistema_clr2, ['route' =>  $reg_sistema->link, 'class' => 'nav-item has-treeview menu-open'])
                        ->prepend(' <i class="fas fa-circle nav-icon"></i>')
                        ->id($reg_sistema->id);
                } else if (($v_n1 != '') && ($v_n2 != '') && ($v_n3 != '') && ($v_n4 == '')) {
                    //////////////////////NIVEL 2 //////////////////////
                    $reg_sistema_clr2 = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                    $menu->$reg_sistema_clr->add($reg_sistema->sistema, $reg_sistema_clr2, ['route' =>  $reg_sistema->link, 'class' => 'nav-item has-treeview menu-open', 'parente' => $menu->$reg_sistema_clr->id])
                        ->prepend(' <i class="fas fa-circle nav-icon"></i>')
                        ->id($reg_sistema->id);
                } //
            }
            // \Menu::make('Menuprincipal', function($menu){
            /*$menu->add('Administração', 'administracao',    ['url'  => $reg_sistema->link, 'class' => 'nav-item has-treeview menu-open'])
                ->prepend(' <i class="nav-icon fas fa-tachometer-alt"></i>');

            $menu->administracao->add('Sistema', ['url'  => $reg_sistema->link, 'class' => 'nav-item']);
            $menu->administracao->add('Grupo Acesso', ['route'  => 'admin.grupoacesso', 'class' => 'nav-item']);
            $menu->administracao->add('Permissão', ['route'  => 'admin.permissao', 'class' => 'nav-item']);

            $menu->add('Cadastro', 'cadastro',    ['route'  => 'admin.usuariogrupo', 'class' => 'nav-item has-treeview menu-open'])
                ->prepend('<i class="nav-icon fas fa-tachometer-alt"></i>');

            $menu->cadastro->add('Cliente', ['route'  => 'admin.permissao', 'class' => 'nav-item'])
                ->prepend('<i class="far fa-dot-circle nav-icon"></i>');
            $menu->cadastro->add('Usuário', ['route'  => 'admin.grupoacesso', 'class' => 'nav-item'])
                ->prepend('<i class="far fa-dot-circle nav-icon"></i>');
            $menu->cadastro->add('Plano', ['route'  => 'admin.permissao', 'class' => 'nav-item'])
                ->divide();

            $menu->add('Relatório', 'relatorio',    ['route'  => 'admin.usuariogrupo', 'class' => 'nav-item has-treeview menu-open'])
                ->prepend('<i class="far fa-dot-circle nav-icon"></i>');
*/
            // $menu->add('Home');

            // $menu->add('About',    ['route'  => 'admin.permissao']);

            // $menu->about->add('Who are we?', 'who-we-are');
            //  $menu->about->add('What we do?', 'what-we-do');

            // $menu->add('Services', 'services');
            // $menu->add('Contact',  'contact');

            /*$menu->group(['prefix' => 'pages', 'data-info' => 'test'], function($m){

                $m->add('About', 'about');

                $m->group(['prefix' => 'about', 'data-role' => 'navigation'], function($a){

                    $a->add('Who we are', 'who-we-are?');
                    $a->add('What we do?', 'what-we-do');
                    $a->add('Our Goals', 'our-goals');
                });
            }) */

            /*    $menu->add('Users', ['class'=>'nav-item has-treeview'])
                ->prepend('<i class="fa fa-fw fa-users nav-icon"></i><p>')
                ->append('<i class="right fa fa-angle-left"></i></p>')
                    ->link
                        ->attr(['class' => 'nav-link'])
                        ->href('#');

                $menu->users->add('Liste des users', ['route' => 'admin.permissao'])
                    ->attr(['class' => 'nav-item'])
                    ->prepend('<i class="fa fa-fw fa-list-ul"></i><p>')
                    ->append('</p>')
                    ->link
                        ->attr(['class' => 'nav-link']);

                $menu->users->add('Liste users 2', ['route' => 'admin.permissao'])
                    ->attr(['class' => 'nav-item'])
                    ->prepend('<i class="fas fa-circle-o nav-icon"></i><p>')
                    ->append('</p>')
                    ->link
                        ->attr(['class' => 'nav-link']);*/
        });

        return $next($request);
    }
}
