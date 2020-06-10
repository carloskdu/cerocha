@extends('layouts.admin.admin')
<!--bibliotecas JS específica ou include jddefault-->
@section('bibliotecas_css')
@include('layouts.admin.bibl_cssdefault')
@endsection

@section('titulo', "Principal")

@section('conteudo')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title col-3">Cadastro de Sistemas</h3>
            <div class="card-tools col-9">
              <div class="input-group input-group-sm col-5">
                {{ $registros->links() }}
              </div>
              <div class="input-group input-group-sm col-3 float-right">
                <button class='btn btn-info'><a href="{{ route('admin.sistema.adicionar') }}">
                    <i class="fas fa-plus nav-icon"></i></a></button>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-nowrap table-head-fixed ">
              <thead>
                <tr>
                  <th style="width: 10px">Id</th>
                  <th>Sistema</th>
                  <th>Link</th>
                  <th>Nível</th>
                  <th>Ativo</th>
                  <th>Link Imagem</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                @foreach($registros as $registro)
                <tr>
                  <td>{{$registro->id }}</td>
                  <td>{{$registro->sistema }}</td>
                  <td><span class="badge bg-danger">{{$registro->link }}</span></td>
                  <td><span class="badge bg-danger">{{$registro->nivel }}</span></td>
                  <td>{{$registro->ativo }}</td>
                  <td>@if ($registro->link_imagem!="" || $registro->link_imagem!=' ')<img width="80" src="{{asset($registro->link_imagem)}}" alt="{{ $registro->sistema }}" />@endif</td>
                  <td>
                    <button class="btn float-left"><a href="{{ route('admin.sistema.editar',$registro->id) }}"><i class="far fa-edit nav-icon"></i></a></button>
                    <button class="btn bg-danger float-right"><a href="{{ route('admin.sistema.deletar',$registro->id) }}"><i class="fas fa-trash-alt nav-icon"></i></a></button>
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