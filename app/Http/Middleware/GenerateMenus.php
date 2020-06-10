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
                ->select('id', 'sistema', 'link', 'nivel', 'ativo', 'link_imagem')
                ->orderBy('nivel', 'asc')
                ->get();

            $v_niv1 = $v_niv2 = $v_niv3 = 0;
            foreach ($reg_sistemas as $reg_sistema) {

                //$reg_sistema->id
                //$reg_sistema->nivel
                //$reg_sistema->ativo


                $v_nivel = explode(".", $reg_sistema->nivel);
                $v_n1 = isset($v_nivel[0]) ? $v_nivel[0] : "";
                $v_n2 = isset($v_nivel[1]) ? $v_nivel[1] : "";
                $v_n3 = isset($v_nivel[2]) ? $v_nivel[2] : "";
                $v_n4 = isset($v_nivel[3]) ? $v_nivel[3] : "";
                //dd($reg_sistema->link);
                //$reg_sistema_clr = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                if (($v_n1 != '') && ($v_n2 == '') && ($v_n3 == '') && ($v_n4 == '')) {
                    //////////////////////NIVEL 1 //////////////////////
                    $reg_sistema_clr = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                    $menu->add($reg_sistema->sistema, str_replace('.', '/', $reg_sistema->link), ['class' => 'nav-item has-treeview menu-open'])
                        ->prepend(' <i class="fas fa-circle nav-icon"></i>')
                        ->id($reg_sistema->id);
                } else if (($v_n1 != '') && ($v_n2 != '') && ($v_n3 == '') && ($v_n4 == '')) {
                    //////////////////////NIVEL 1 //////////////////////
                    $reg_sistema_clr2 = str_replace(" ", "", strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($reg_sistema->sistema)))));
                    $menu->$reg_sistema_clr->add($reg_sistema->sistema, str_replace('.', '/', $reg_sistema->link), ['class' => 'nav-item has-treeview menu-open'])
                        ->prepend(' <i class="far fa-dot-circle nav-icon"></i>')
                        ->id($reg_sistema->id);
                }
            }
        });

        return $next($request);
    }
}
