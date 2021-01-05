@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ html_entity_decode(trans('master.masterTextoBorrar1_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('master.masterTextoBorrar1_h1') )}}
@endsection

@section('breadcrumb1')
	<a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('master.masterTextoBorrar1_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('master.masterTextoBorrar1_keywords') )}}
@endsection

@section('main_content')

<section>
    <div class="container">
        <div class="row content h-100 text-justify">
            <p>{{ html_entity_decode(trans('master.masterTextoBorrar1_texto1') )}}</p>
            <p>{{ html_entity_decode(trans('master.masterTextoBorrar1_texto2') )}}</p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="texto[id]" value="{{ $texto['id'] }}">
                <div class="row mt-5">
                    <div class="col-md-12 border">
                        <input type="text" class="form-control" name="texto[texto]" placeholder="Enter ..." value="{{ $texto['texto'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <input type="text" class="form-control text-center my-1 mr-sm-2" name="texto[orden]" placeholder="Enter ..." value="{{ $texto['orden'] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-4 col-md-3">
    			<a href="/es/masterPuntoModificar/{{$texto['punto_id']}}"><button type="submit" class="btn btn-info btn-lg pull-left">{{trans('pagination.volver')}}</button></a>
    		</div>
    		<div class="col-sm-4 col-md-3">
    			<a href="/es/masterTextoBorrar2/{{$texto['id']}}"><button type="submit" class="btn btn-danger btn-lg pull-center">{{trans('pagination.confirmar')}}</button></a>
    		</div>
    	</div>
    </div>
</section>
@endsection





