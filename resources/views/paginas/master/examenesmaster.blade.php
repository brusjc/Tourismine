@extends('adminlte::layouts.master_examenes')

@section('contentheader_title')
	Todos los exámenes
@endsection

@section('descripcion')
    "Todos los examenes"
@endsection

@section('keywords')
    "Examenes"
@endsection

@section('main_content')
@endsection


@if(!is_null($pruebasmaster['data']))
	@section('tablacodigos')
		@foreach($pruebasmaster['data'] as $prueba)
			<tr>
				<td><a href="temasmaster/{{$prueba['id']}}">{{$prueba['nivel_id']}}</a></td>
				<td><a href="temasmaster/{{$prueba['id']}}">{{$prueba['nombre']}}</a></td>
				<td><a href="temasmaster/{{$prueba['id']}}">{{date('d-m-Y', strtotime($prueba['created_at']))}}</a></td>
				<td><a href="temasmaster/{{$prueba['id']}}">{{$prueba['codigo']}}</a></td>
			</tr>
		@endforeach
	@endsection
@endif

