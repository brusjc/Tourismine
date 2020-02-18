@if(trim($__env->yieldContent('tablapuntos')))

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 8%">Provincia</th>
                        <th style="width: 8%">Ciudad</th>
                        <th style="width: 64%">Punto</th>
                        <th style="width: 10%">
                            <a href="/masterPuntoNuevo"><button type="button" class="btn btn-block btn-info">Nuevo punto</button></a>
                        </th>
                        <th style="width: 5%"><i class="fa fa-edit"></th>
                        <th style="width: 5%"><i class="fa fa-trash"></th>
                    </tr>
                    @yield('tablapuntos')
                </table>
            </div>
        </div>
    </div> 
@endif