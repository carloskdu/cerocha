<div class="row">
    <div class="col-md-12">

    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">@yield('titulo_form')</h3>
        </div>
        <div class="card-body">
        <!-- Date dd/mm/yyyy -->
        <div class="form-group">
            <label>Grupo</label>
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control col-8" maxlength="30" name="grupo" value="{{isset($registro->grupo) ? $registro->grupo : ''}}">
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
