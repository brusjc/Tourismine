-@extends('adminlte::layouts.app_master')

@section('contentheader_title')
    {{trans('p_home.Title')}}
@endsection

@section('H1')
    {{trans('p_home.H1')}}
@endsection

@section('descripcion')
    "Todos los examenes"
@endsection

@section('keywords')
    "Examenes"
@endsection

@section('content')
	<p>esto es una prueba de cómo funciona la app</p>
	
@endsection


@if(!is_null($puntos['data']))
	@section('tablapuntos')
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
		        </tr>
	        @endif
	        <tr>
	            <td></td>
	            <td></td>
	            <td colspan="2">{{$punto['nombre']}}</td>
	            <td><a href="/masterPuntoModificar/{{$punto['id']}}"><i class="fa fa-edit"></i></a></td>
	            <td><a href="/masterPuntoBorrar1/{{$punto['id']}}"><i class="fa fa-trash"></i></a></td>
	        </tr>
		@endforeach        
	@endsection
@endif





