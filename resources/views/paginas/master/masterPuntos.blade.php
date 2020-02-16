@extends('adminlte::layouts.app_master')

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
	
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
@endsection


@if(!is_null($puntos['data']))
	@section('tablapuntos')
		@foreach($puntos['data'] as $key1=>$punto)
	        @if($key1==0 || $puntos['data'][$key1]['estado'][0]['id']!=$puntos['data'][$key1-1]['estado'][0]['id'])
		        <tr>
		            <td colspan="4"><h3>{{$punto['estado'][0]['nombre']}}</h3></td>
		        </tr>
	        @endif
	        @if($key1==0 || $puntos['data'][$key1]['provincia']['id']!=$puntos['data'][$key1-1]['provincia']['id'])
		        <tr>
		            <td></td>
		            <td colspan="3">{{$punto['provincia']['nombre']}}</td>
		        </tr>
	        @endif
	        <tr>
	            <td></td>
	            <td></td>
	            <td colspan="2">{{$punto['nombre']}}</td>
	            <td><a href="/masterPuntoModificar/{{$punto['id']}}"><i class="fa fa-edit"></i></a></td>
	        </tr>
		@endforeach        
	@endsection
@endif





