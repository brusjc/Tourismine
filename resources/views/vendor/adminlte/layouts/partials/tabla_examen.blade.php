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
                    @foreach($examen["data"][0]['area'] as $key=>$area)
                       <tr> 
                            <td  colspan="2">{{$examen["data"][0]['temanombre'][$key]['nombre']}}</td>
                            <td>{{$area['porcentaje']}}</td>
                            <td></td>
                       </tr>
                        @foreach($area["subarea"] as $key2=>$subarea)
                           <tr> 
                                <td></td>
                                <td><a href="/examen/{{$subarea['id']}}">{{$subarea['subtemanombre']['nombre']}}</a></td>
                                <td>{{$subarea['porcentaje']}}</td>
                                <td></td>
                           </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div> 
@endif