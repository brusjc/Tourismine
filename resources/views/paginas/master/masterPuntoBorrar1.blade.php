@extends('layouts.app')

@section('contentheader_title')
	{{ html_entity_decode(trans('pagMaster.masterBorrar1_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagMaster.masterBorrar1_h1') )}}
@endsection

@section('breadcrumb1')
	<a href="/master">{{ trans('pagMaster.master_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagMaster.masterBorrar1_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagMaster.masterBorrar1_keywords') )}}
@endsection

@section('main_content')
    <div class="comment-text">
        <p>{{ html_entity_decode(trans('pagMaster.masterBorrar1_texto1') )}}</p>
        <p>{{ html_entity_decode(trans('pagMaster.masterBorrar1_texto2') )}}</p>
    </div>
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<a href="/master"><button type="submit" class="btn btn-info btn-lg pull-left">{{trans('pagination.volver')}}</button></a>
		</div>
		<div class="col-sm-4 col-md-3">
			<a href="/masterPuntoBorrar2/{{$id}}"><button type="submit" class="btn btn-danger btn-lg pull-center">{{trans('pagination.confirmar')}}</button></a>
		</div>
	</div>
@endsection





