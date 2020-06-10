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
                <h3 class="card-title">Cadastro dos Estados</h3>
                <div class="card-tools col-8">                   
                  {{ $registros->links() }}

                  <div class="input-group input-group-sm col-5 float-right">
                    <input type="text" name="table_search" class="form-control" placeholder="Search">

                    <div class="input-group-append float-right">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  
                  

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover text-nowrap table-head-fixed ">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Estado</th>
                      <th style='text-align: center;'>Sigla</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($registros as $registro)
                    <tr>
                      <td>{{$registro->id }}</td>
                      <td>{{$registro->nome_estado }}</td>
                      <td style='text-align: center;'><span class="badge bg-danger">{{$registro->sigla }}</span></td>
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