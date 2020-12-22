@if(trim($__env->yieldContent('tablaexamen')))
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
                    @foreach($examen['original']["data"]['area'] as $key=>$area)
                       <tr style="font-weight: bold;"> 
                            <td  colspan="2">{{$area['temanombre']['nombre']}}</td>
                            <td></td>
                            <td>{{$area['porcentaje']}}%</td>
                       </tr>
                        @foreach($area["subarea"] as $key2=>$subarea)
                            <tr> 
                                <td></td>
                                <td><a href="/examen/{{$subarea['id']}}">{{$subarea['subtemanombre']['nombre']}}</a></td>
                                <td></td>
                                <td><a href="/examen/{{$subarea['id']}}">{{$subarea['porcentaje']}}%</a></td>
                           </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div> 
@endif