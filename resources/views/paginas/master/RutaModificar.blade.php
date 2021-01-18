@extends('layouts.frontAdmin.general')

@section('contentheader_title'){{ trans('master.RutaModificar_title') }}@endsection

@section('contentheader_h1'){{ trans('pagRaiz.RutaModificar_h1') }}@endsection

@section('breadcrumb1')<a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>@endsection

@section('descripcion'){{ trans('pagRaiz.RutaModificar_descripcion') }}@endsection

@section('keywords'){{ trans('pagRaiz.RutaModificar_keywords') }}@endsection

@section('main_content')

@if(isset($errors))
	<section class="content">
		@if(count($errors)>0)
			<div class="callout callout-danger">
				<div class="errors">
					<ul>
						@foreach($errors as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
	</section>
@endif

<section class="mb-5">
    <div class="container">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
				<form action="/es/ruta-modificar2/{{$ruta['id']}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="nombre" class="control-label">{{ucfirst(trans('master.nombre'))}}(*)</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Enter ..." value="{{$ruta['nombre']}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tipo_id" class="col-sm-2 control-label">{{ucfirst(trans('master.tipo'))}}(*)</label>
                                <select class="form-control select2" name="tipo_id">
                                    <option value="0"></option>
                                    @foreach($tiporutas as $tiporuta)
                                        @if($tiporuta['id']=$ruta['tipo_id'])
                                            <option value="{{$tiporuta['id']}}" selected>{{$tiporuta['nombre']}}</option>
                                        @else
                                            <option value="{{$tiporuta['id']}}">{{$tiporuta['nombre']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

				        <div class="row">
							<div class="form-group col-md-4">
								<label for="ciudad_id" class="control-label">{{ucfirst(trans('master.ciudad'))}}(*)</label>
								<select class="form-control select2" name="ciudad_id" id="ciudad_id">
                                    <option value="0"></option>
									@foreach($ciudades as $ciudad)
                                        @if($ciudad['id']=$ruta['ciudad_id'])
                                            <option value="{{$ciudad['id']}}" selected>{{$ciudad['nombre']}}</option>
                                        @else
                                            <option value="{{$ciudad['id']}}">{{$ciudad['nombre']}}</option>
                                        @endif
									@endforeach
								</select>
							</div>
                            <div class="form-group col-md-1">
                                <label for="dias" class="col-sm-2 control-label">{{ucfirst(trans('master.dias'))}}(*)</label>
                                <input type="text" class="form-control" name="dias" placeholder="Enter ..." value="{{$ruta['dias']}}">
                            </div>
						</div>

                        <div class="box-footer my-5">
                            <a href="/es/master" class="btn btn-info pull-left">{{ucfirst(trans('master.volver'))}}</a>
                            <button type="submit" class="btn btn-info pull-right">{{ucfirst(trans('master.actualizar'))}}</button>
                        </div>

					</div>
				</form>
			</div>
		</div>
	</div>
</section>


@endsection





