@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ trans('master.masterRutas_title') }}{{$rutas[0]['ciudad']['nombre']}}
@endsection

@section('contentheader_h1')
	{{ trans('master.masterRutas_h1') }}{{$rutas[0]['ciudad']['nombre']}}
@endsection

@section('breadcrumb1')
    <a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ trans('master.masterRutas_descripcion') }}{{$rutas[0]['ciudad']['nombre']}}
@endsection

@section('keywords')
    {{ trans('master.masterRutas_keywords') }}{{$rutas[0]['ciudad']['nombre']}}
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 8%">Ruta</th>
                        <th style="width: 6%">Orden</th>
                        <th style="width: 61%">Puntos</th>
                        <th style="width: 13%">
                            <a href="/es/masterRutaNueva"><button type="button" class="btn btn-block btn-info">{{ ucfirst(trans('master.nuevaRuta')) }}</button></a>
                        </th>
                        <th style="width: 5%"><i class="fa fa-edit"></th>
                        <th style="width: 5%"><i class="fa fa-trash"></th>
                    </tr>
                    @if(isset($rutas))
                        @foreach($rutas as $key1=>$ruta)
                            <tr>
                                <td colspan="3"><h3>{{$ruta['nombre']}}</h3></td>
                                <td>
                                    <a href="/es/ruta-punto-nuevo/{{ $ruta['id'] }}"><button type="button" class="btn btn-block btn-info">{{ ucfirst(trans('master.incluirPunto')) }}</button></a>
                                </td>
                            </tr>
                            @if(isset($ruta['rutapunto']))
                                @foreach($ruta['rutapunto'] as $key2=>$punto)
                                    <tr>
                                        <td></td>
                                        <td class="center">{{$punto['orden']}}</td>
                                        <td colspan="2">{{$punto['datospunto']['nombre']}}</td>
                                        <td></td>
                                        <td><a href="/es/ruta-punto-borrar1/{{$punto['id']}}"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div> 
	
@endsection





