@extends('adminlte::layouts.app_master')

@section('contentheader_title')
    {{trans('p_master.MasterPuntoBorrar2_Title')}}
@endsection

@section('H1')
    {{trans('p_master.MasterPuntoBorrar2_H1')}}
@endsection

@section('descripcion')
    "Todos los examenes"
@endsection

@section('keywords')
    "Examenes"
@endsection

@section('content')
	@if($respuesta)
		@if($respuesta['status']['error']==0)
			<p>{{trans('p_master.MasterPuntoBorrar2_Body1')}}</p>
		@else
			<p>{{trans('p_master.MasterPuntoBorrar2_Body2')}}</p>
		@endif
	@endif
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<a href="/master"><button type="submit" class="btn btn-info btn-lg pull-left">{{trans('pagination.Volver')}}</button></a>
		</div>
	</div>
@endsection





