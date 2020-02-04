@if(trim($__env->yieldContent('tablapuntos')))

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 8%">Estado</th>
                        <th style="width: 8%">Provincia</th>
                        <th style="width: 84%">Punto</th>
                    </tr>
                    @yield('tablapuntos')
                </table>
            </div>
        </div>
    </div> 
@endif