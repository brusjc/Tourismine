@if (trim($__env->yieldContent('tablaexamenes')))
    <div class="row">
        <div class="col-md-12">
            <div class="box"><div class="box-header with-border">
                <h2 class="box-title">@yield('titulotablaexamenes')</h2>
                @if($codigo!=0)
                    <a href="/examennuevo/{{$codigo}}">
                        <button type="button" class="btn btn-primary">{{ trans('message.examen_nuevo') }}</button>
                    </a>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Examen</th>
                        <th>Fecha</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                    @yield('tablaexamenes')
                </table>
            </div>
        </div>
    </div> 
@endif
