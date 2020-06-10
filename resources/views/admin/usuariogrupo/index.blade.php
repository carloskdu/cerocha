@extends('layouts.admin.admin')
<!--bibliotecas JS específica ou include jddefault-->
@section('bibliotecas_css')
  @include('layouts.admin.bibl_cssdefault')
@endsection

@section('titulo', "Permissão de Usuário")

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
                    <div class="form-group">
                      <label>Lista de Usuários</label>
                      <select class="form-control select2bs4" id='usuario_id' style="width: 100%;">
                        <option value='0' >Selecione um Usuário</option>
                        @foreach($reg_users as $reg_user)
                          <option value="{{$reg_user->id}}">{{$reg_user->name}} - {{$reg_user->email}}</option>
                        @endforeach
                      </select>
                    </div>
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
                          <th style="text-align: center" >{{$reg_grupoacesso->grupo}} <br/>
                           <div class="icheck-primary d-inline">
                               <input type="checkbox" class='gravausuariogrupo' id_usrgrp="" id="usergrupo{{$reg_grupoacesso->id}}"  value='{{$reg_grupoacesso->id}}'>
                               <label for="usergrupo{{$reg_grupoacesso->id}}"></label>
                          </div>
                          </th>
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
                                    <input type="checkbox"  @if ($statuspermissao[$reg_sistema->id][$reg_grupoacesso->id]!='') {!! 'checked="checked" ' !!} @endif  id_perm="{{$statuspermissao[$reg_sistema->id][$reg_grupoacesso->id]}}"  id="sisgrupo[{{$reg_sistema->id}}][{{$reg_grupoacesso->id}}]" value='{{$reg_sistema->id}}-{{$reg_grupoacesso->id}}' disabled>
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

      $('.gravausuariogrupo').click(function(){
          var usuario_id = $('#usuario_id option:selected').val();
          var grupo_id = $(this).attr('value');
          var token = $("input[name=_token]").val();
          var status = $(this).is(':checked');
          
          if (usuario_id>'0'){
           
              //Inserir quando marcar
              if(status){            
              $.ajax({
                  type:'POST',
                  url:"{{ route('admin.usuariogrupo.salvar') }}",
                  data:{user_id:usuario_id, grupo_id:grupo_id, _token: token},
                  success:function(data){
                  }
                });
              } else {
                //Remover quando desmarcar
                var id_usrgrp = $(this).attr('id_usrgrp');  
                //$("#usergrupo"+i).attr('id_usrgrp');          
                $.ajax({
                  type:'POST',
                  url:"{{ route('admin.usuariogrupo.deletar') }}",
                  data:{id_usrgrp:id_usrgrp, _token: token},
                  success:function(data){
                  }
                });
              }
          } else {
            alert('Selecione um Usuário');
            //$(this).is(':checked');
            $(this).prop( "checked", false );

          }
      });

      $("#usuario_id").on("change",function(){
          $(".gravausuariogrupo").prop( "checked", false );
          var usuario_id = $(this).val();
          var token = $("input[name=_token]").val();
          if (usuario_id>0){
            $.ajax({
                  type:'POST',
                  url:"{{ route('admin.usuariogrupo.consultausuario') }}",
                  data:{usuario_id:usuario_id, _token: token},
                  success:function(data){
                    
                    $.each( data.status.user, function( i, item ) {
                      if (item){
                          $("#usergrupo"+i).prop( "checked", true );
                          $("#usergrupo"+i).attr( "id_usrgrp", item );
                      }
                    });
                  }
                });
          }
      });
  </script>

@endsection