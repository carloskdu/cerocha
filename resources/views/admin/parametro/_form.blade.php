<div class="row">
    <div class="col-md-12">

    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">@yield('titulo_form')</h3>
        </div>
        <div class="card-body">
        <!-- Date dd/mm/yyyy -->
        <div class="form-group">
            <label>Descrição</label>
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control col-8" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
            </div>
            <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <!-- Date mm/dd/yyyy -->
        <div class="form-group">
            <label>Valor</label>
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text "><i class="fas fa-align-left""></i></span>
            </div>
            <input type="text" class="form-control col-4" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
            </div>
            <!-- /.input group -->
        </div>
        <!-- /.form group -->

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col (left) -->
</div>
<!-- /.row -->
