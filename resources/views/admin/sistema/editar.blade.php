@extends('layouts.admin.admin')
<!--bibliotecas JS específica ou include jddefault-->
@section('bibliotecas_css')
  @include('layouts.admin.bibl_cssform')
@endsection

@section('titulo', "Principal")

@section('titulo_form', "Editar Sistema")

@section('conteudo')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">            
        <form class="" action="{{route('admin.sistema.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.sistema._form')
            <button class="btn btn-success">Atualizar</button>
        </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    </div>
  <!-- /.content -->
@endsection

@section('bibliotecas_js')
  @include('layouts.admin.bibl_jsform')
@endsection