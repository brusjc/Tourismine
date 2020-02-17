@extends('adminlte::layouts.app_master')

@section('contentheader_title')
    {{trans('p_master.MasterPuntoBorrar1_Title')}}
@endsection

@section('H1')
    {{trans('p_master.MasterPuntoBorrar1_H1')}}
@endsection

@section('descripcion')
    "Todos los examenes"
@endsection

@section('keywords')
    "Examenes"
@endsection

@section('content')
	<p>{{trans('p_master.MasterPuntoBorrar1_Body1')}}</p>
	<p>{{trans('p_master.MasterPuntoBorrar1_Body2')}}</p>
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<a href="/master"><button type="submit" class="btn btn-info btn-lg pull-left">{{trans('pagination.Volver')}}</button></a>
		</div>
		<div class="col-sm-4 col-md-3">
			<a href="/masterPuntoBorrar2/{{$id}}"><button type="submit" class="btn btn-danger btn-lg pull-center">{{trans('pagination.Confirmar')}}</button></a>
		</div>
	</div>
@endsection





