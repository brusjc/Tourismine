@extends('layouts.frontAdmin.general')

@section('contentheader_title'){{ trans('master.rutaNuevo_title') }}@endsection

@section('contentheader_h1'){{ trans('pagRaiz.rutaNuevo_h1') }}@endsection

@section('breadcrumb1')<a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>@endsection

@section('descripcion'){{ trans('pagRaiz.rutaNuevo_descripcion') }}@endsection

@section('keywords'){{ trans('pagRaiz.rutaNuevo_keywords') }}@endsection

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
				<form action="/es/ruta-nuevo2" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="nombre" class="control-label">{{ucfirst(trans('master.nombre'))}}(*)</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Enter ..." value="">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tipo_id" class="col-sm-2 control-label">{{ucfirst(trans('master.tipo'))}}(*)</label>
                                <select class="form-control select2" name="tipo_id">
                                    <option value="0" selected></option>
                                    @foreach($tiporutas as $tiporuta)
                                        <option value="{{$tiporuta['id']}}">{{$tiporuta['nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

				        <div class="row">
							<div class="form-group col-md-4">
								<label for="ciudad_id" class="control-label">{{ucfirst(trans('master.ciudad'))}}(*)</label>
								<select class="form-control select2" name="ciudad_id" id="ciudad_id">
                                    <option value="0" selected></option>
									@foreach($ciudades as $ciudad)
										<option value="{{$ciudad['id']}}">{{$ciudad['nombre']}}</option>
									@endforeach
								</select>
							</div>
                            <div class="form-group col-md-1">
                                <label for="dias" class="col-sm-2 control-label">{{ucfirst(trans('master.dias'))}}(*)</label>
                                <input type="text" class="form-control" name="dias" placeholder="Enter ..." value="0">
                            </div>
						</div>

                        <div class="box-footer my-5">
                            <a href="/es/master" class="btn btn-info pull-left">{{ucfirst(trans('master.volver'))}}</a>
                            <button type="submit" class="btn btn-info pull-right">{{ucfirst(trans('master.guardar'))}}</button>
                        </div>

					</div>
				</form>
			</div>
		</div>
	</div>
</section>


@endsection





