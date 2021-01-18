@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ html_entity_decode(trans('master.master_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('master.master_h1') )}}
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('master.master_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('master.master_keywords') )}}
@endsection

@section('main_content')

@if(isset($message))
    <section>
        <div class="container my-3">
            <div class="row content h-100 text-justify">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <div class="callout callout-info">
                                <div class="messages my-4">
                                    {{ $message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 8%">Provincia</th>
                            <th style="width: 8%">Ciudad</th>
                            <th style="width: 54%">Punto</th>
                            <th style="width: 15%">
                                <a href="/es/PuntoNuevo"><button type="button" class="btn btn-block btn-info">Nuevo punto</button></a>
                            </th>
                            <th style="width: 5%"><i class="fa fa-edit"></i></th>
                            <th style="width: 5%"><i class="fa fa-trash"></i></th>
                        </tr>
    					@foreach($puntos['data'] as $key1=>$punto)
    				        @if($key1==0 || $puntos['data'][$key1]['provincia'][0]['id']!=$puntos['data'][$key1-1]['provincia'][0]['id'])
    					        <tr>
    					            <td colspan="4"><h3>{{$punto['provincia'][0]['nombre']}}</h3></td>
    					        </tr>
    				        @endif
    				        @if($key1==0 || $puntos['data'][$key1]['ciudad']['id']!=$puntos['data'][$key1-1]['ciudad']['id'])
    					        <tr>
    					            <td></td>
    					            <td colspan="3">{{$punto['ciudad']['nombre']}}</td>
                                    <td colspan="2"><a href="/es/rutas/{{$punto['ciudad']['id']}}">Rutas</a></td>
    					        </tr>
    				        @endif
    				        <tr>
    				            <td></td>
    				            <td></td>
    				            <td colspan="2">{{$punto['nombre']}}</td>
    				            <td><a href="/es/masterPuntoModificar/{{$punto['id']}}"><i class="fa fa-edit"></i></a></td>
    				            <td><a href="/es/masterPuntoBorrar1/{{$punto['id']}}"><i class="fa fa-trash"></i></a></td>
    				        </tr>
    					@endforeach        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
	
@endsection





