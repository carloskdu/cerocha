<div class="row">
    <div class="col-md-12">

        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title">@yield('titulo_form')</h3>
            </div>
            <div class="card-body">
            <!-- Date dd/mm/yyyy -->
            <div class="form-group">
                <label>Sistema</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                </div>
                <input type="text" class="form-control col-8" name="sistema" value="{{isset($registro->sistema) ? $registro->sistema : ''}}">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
                    <!-- Date mm/dd/yyyy -->
                    <div class="form-group col-6 float-left">
                        <label>Link</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="fas fa-align-left""></i></span>
                            </div>
                            <input type="text" class="form-control col-12" name="link" value="{{isset($registro->link) ? $registro->link : ''}}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Nivel Do Sistema -->
                    <div class="form-group col-6 float-right">
                        <label>Nível</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fas fa-align-left""></i></span>
                        </div>
                        <input type="text" class="form-control col-6" name="nivel" value="{{isset($registro->nivel) ? $registro->nivel : ''}}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

            <!-- Status se Ativo [S/N] -->
            <div class="form-group">
               <input type="checkbox" class="form-control float-right col-1" name="ativo" value="{{isset($registro->ativo) ? $registro->ativo : ''}}">
                <label class='float-right'>Ativo</label>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            
            <!-- Status se Ativo [S/N] -->
            <div class="form-group">
                <label>Link Imagem</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text "><i class="fas fa-align-left""></i></span>
                </div>
                <input type="file" class="form-control col-4" name="link_imagem" value="{{isset($registro->link_imagem) ? $registro->link_imagem : ''}}">
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
