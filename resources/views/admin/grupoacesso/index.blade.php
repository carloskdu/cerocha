@extends('layouts.admin.admin')
<!--bibliotecas JS específica ou include jddefault-->
@section('bibliotecas_css')
  @include('layouts.admin.bibl_cssdefault')
@endsection

@section('titulo', "Grupo Acesso")

@section('conteudo')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de Grupos de Acesso</h3>
                <div class="card-tools col-10">

                {{ $registros->links() }}

                <button class='btn btn-info'><a href="{{ route('admin.grupoacesso.adicionar') }}" >
                    <i class="fas fa-plus nav-icon"></i></a></button>        

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover text-nowrap table-head-fixed ">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nome do Grupo</th>
                      <th >Ação</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($registros as $registro)
                    <tr>
                      <td >{{$registro->id }}</td>
                      <td >{{$registro->grupo }}</td>
                        <td>
                          <button class="btn float-left "><a href="{{ route('admin.grupoacesso.editar',$registro->id) }}"><i class="far fa-edit nav-icon"></i></a></button>
                          <button class="btn bg-danger float-right"><a href="{{ route('admin.grupoacesso.deletar',$registro->id) }}"><i class="fas fa-trash-alt nav-icon"></i></a></button>
                       </td>
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
@endsection