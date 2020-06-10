@extends('layouts.admin.admin')
<!--bibliotecas JS específica ou include jddefault-->
@section('bibliotecas_css')
  @include('layouts.admin.bibl_cssform')
@endsection

@section('titulo', "Principal")

@section('titulo_form', "Adicionar Grupo de Acesso")

@section('conteudo')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">            
        <form class="" action="{{route('admin.grupoacesso.salvar')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('admin.grupoacesso._form')
            <button class="btn btn-success">Salvar</button>
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