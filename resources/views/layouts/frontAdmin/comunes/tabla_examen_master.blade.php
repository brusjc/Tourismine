@if(trim($__env->yieldContent('tablamiexamen')))

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 8%">Área</th>
                        <th style="width: 62%">Subarea</th>
                        <th style="width: 20%">Progress</th>
                        <th style="width: 10%">%</th>
                    </tr>
                    @yield('tablamiexamen')
                </table>
            </div>
        </div>
    </div> 
@endif