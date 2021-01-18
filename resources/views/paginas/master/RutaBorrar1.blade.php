@extends('layouts.frontAdmin.general')

@section('contentheader_title'){{ trans('master.RutaBorrar_title')}}@endsection

@section('contentheader_h1'){{ trans('master.RutaBorrar_h1') }}@endsection

@section('breadcrumb1')<a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>@endsection

@section('breadcrumb2')<a href="/es/rutas/{{$ruta['ciudad_id']}}">{{ trans('master.masterRutas_breadcrumb') }}</a>@endsection

@section('descripcion')){{ trans('master.RutaBorrar_descripcion') }}@endsection

@section('keywords'){{ trans('master.RutaBorrar_keywords') }}@endsection

@section('main_content')
    <div class="comment-text">
        <p>{{ trans('master.RutaBorrar_texto1') }}</p>
        <p>{{ trans('master.RutaBorrar_texto2') }}</p>
    </div>
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<a href="/es/rutas/{{$ruta['ciudad_id']}}"><button type="submit" class="btn btn-info btn-lg pull-left">{{trans('pagination.volver')}}</button></a>
		</div>
		<div class="col-sm-4 col-md-3">
			<a href="/es/ruta-borrar2/{{$ruta['id']}}"><button type="submit" class="btn btn-danger btn-lg pull-center">{{trans('pagination.confirmar')}}</button></a>
		</div>
	</div>
@endsection





