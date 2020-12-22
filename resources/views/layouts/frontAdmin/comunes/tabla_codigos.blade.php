@if (trim($__env->yieldContent('tablacodigos')))
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Todos los exámenes ordenados por nivel</h3>
                </div>  <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Grado</th>
                            <th>Examen</th>
                            <th>Fecha</th>
                            <th>Código</th>
                        </tr>
                        @yield('tablacodigos')
                    </table>
                </div>  <!-- /.box-body -->
            </div>  <!-- /.box -->
        </div>
    </div>  <!-- /.row -->
@endif
