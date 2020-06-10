@extends('layouts.admin.admin')
<!--bibliotecas JS específica ou include jddefault-->
@section('bibliotecas_css')
  @include('layouts.admin.bibl_cssdefault')
@endsection

@section('titulo', "Permissão de Grupo")

@section('conteudo')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de Sistema e Grupos de Acesso</h3>
                <div class="card-tools col-10">
               </div>
              </div>
              <!-- /.card-header -->
               {{ csrf_field() }}
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover text-nowrap table-head-fixed ">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nome do Sistema</th>
                      @foreach($reg_grupoacessos as $reg_grupoacesso)
                          <th style="text-align: center" >{{$reg_grupoacesso->grupo}}</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>

                   @foreach($reg_sistemas as $reg_sistema)
                    <tr>
                      <td >{{$reg_sistema->id }}</td>
                      <td >{{$reg_sistema->sistema }}</td>
                            @foreach($reg_grupoacessos as $reg_grupoacesso)


                                 <td style="text-align: center">
                                  <div class="icheck-primary d-inline">
                                    <input type="checkbox" class='gravasistemagrupo' @if ($statuspermissao[$reg_sistema->id][$reg_grupoacesso->id]!='') {!! 'checked="checked" ' !!} @endif  id_perm="{{$statuspermissao[$reg_sistema->id][$reg_grupoacesso->id]}}"  id="sisgrupo[{{$reg_sistema->id}}][{{$reg_grupoacesso->id}}]" value='{{$reg_sistema->id}}-{{$reg_grupoacesso->id}}'>
                                    <label for="sisgrupo[{{$reg_sistema->id}}][{{$reg_grupoacesso->id}}]"></label>
                                  </div>
                                </td>
                            @endforeach

                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
  <!-- /.content -->

@endsection

@section('bibliotecas_js')
  @include('layouts.admin.bibl_jsdefault')
  <script>
      $('.gravasistemagrupo').click(function(){
          var valor = $(this).attr('value').split('-');
          var token = $("input[name=_token]").val();
          var status = $(this).is(':checked');
          //Inserir quando marcar
          if(status){
            $.ajax({
              type:'POST',
              url:"{{ route('admin.permissao.salvar') }}",
              data:{sistema_id:valor[0], grupo_id:valor[1], _token: token},
              success:function(data){
              }
            });
          } else {
            //Remover quando desmarcar
            var id_perm = $(this).attr('id_perm');            
             $.ajax({
              type:'POST',
              url:"{{ route('admin.permissao.deletar') }}",
              data:{id_perm:id_perm, _token: token},
              success:function(data){
              }
            });
          }

      });
  </script>

@endsection