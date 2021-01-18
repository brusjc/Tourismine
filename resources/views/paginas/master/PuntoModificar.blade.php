@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ html_entity_decode(trans('master.masterModificar_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagRaiz.masterModificar_h1') )}}
@endsection

@section('breadcrumb1')
	<a href="/master">{{ trans('master.master_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.masterModificar_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.masterModificar_keywords') )}}
@endsection

@section('main_content')

@if(isset($punto['errors']))
	<section class="content">
		@if(count($punto['errors'])>0)
			<div class="callout callout-danger">
				<div class="errors">
					<ul>
						@foreach($punto['errors'] as $error)
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
				<form action="/es/masterPuntoModificar2/{{$punto['id']}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

                        <input type="hidden" class="form-control" name="id" value="{{$punto['id']}}">

				        <div class="row">
							<div class="form-group col-md-8">
								<label for="Nombre" class="control-label">{{ucfirst(trans('master.nombre'))}}(*)</label>
								<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Enter ..."  value="{{ $punto['nombre'] }}">
							</div>

							<div class="form-group col-md-4">
								<label for="ciudad_id" class="control-label">{{ucfirst(trans('master.ciudad'))}}(*)</label>
								<select class="form-control select2" name="ciudad_id" id="ciudad_id">
									@foreach($ciudades['data'] as $ciudad)
										@if($ciudad['id'] == old('ciudad'))
											<option value="{{$ciudad['id']}}" selected>{{$ciudad['nombre']}}</option>
										@else
											<option value="{{$ciudad['id']}}">{{$ciudad['nombre']}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

				        <div class="row">
							<div class="form-group col-md-10">
								<label for="direccion" class="control-label">{{ucfirst(trans('master.direccion'))}}(*)</label>
								<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Calle ..." value="{{ $punto['direccion'] }}">
							</div>

							<div class="form-group col-md-2">
								<label for="cpostal" class="control-label">{{ucfirst(trans('master.cpostal'))}}(*)</label>
								<input type="text" class="form-control" name="cpostal" id="cpostal" placeholder="Código postal ..." value="{{ $punto['cpostal'] }}">
							</div>
						</div>

				        <div class="row">
							<div class="form-group col-md-2">
								<label for="telefono" class="control-label">{{ucfirst(trans('master.telefono'))}}(*)</label>
								<input type="text" class="form-control" name="telefono" id="telefono" placeholder="000 000000000 ..." value="{{ $punto['telefono'] }}">
							</div>

							<div class="form-group col-md-4">
								<label for="web" class="control-label">{{ucfirst(trans('master.web'))}}(*)</label>
								<input type="text" class="form-control" name="web" id="web" placeholder="www ..." value="{{ $punto['web'] }}">
							</div>

							<div class="form-group col-md-2">
								<label for="latitud" class="control-label">{{ucfirst(trans('master.latitud'))}}(*)</label>
								<input type="text" class="form-control" name="latitud" id="latitud" placeholder="Enter ..." value="{{ $punto['latitud'] }}">
							</div>

							<div class="form-group col-md-2">
								<label for="longitud" class="control-label">{{ucfirst(trans('master.longitud'))}}(*)</label>
								<input type="text" class="form-control" name="longitud" id="longitud" placeholder="Enter ..." value="{{ $punto['longitud'] }}">
							</div>

							<div class="form-group col-md-2">
								<label for="puntos" class="col-sm-2 control-label">{{ucfirst(trans('master.puntuacion'))}}(*)</label>
								<input type="text" class="form-control" name="puntos" id="puntos" placeholder="1 a 10 ..." value="{{ $punto['puntos'] }}">
							</div>
						</div>

				        <div class="row">
							<div class="form-group col-md-2">
								<label for="horario_id" class="control-label">{{ucfirst(trans('master.horario'))}}</label>
								<select class="form-control select2" name="horario_id" id="horario_id" value="{{ $punto['horario_id'] }}">
									<option value="1" selected="selected">Horario 1</option>
									<option value="2">Horario 2</option>
									<option value="3">Horario 3</option>
									<option value="4">Horario 4</option>
									<option value="5">Horario 5</option>
									<option value="6">Horario 6</option>
								</select>
							</div>

							<div class="form-group col-md-3">
								<label for="tipo_id" class="col-sm-2 control-label">{{ucfirst(trans('master.tipo'))}}(*)</label>
								<select class="form-control select2" name="tipo_id" id="tipo_id">
									@foreach($tipos['data'] as $tipo)
										@if($tipo['id'] == old('tipo'))
											<option value="{{$tipo['id']}}" selected>{{$tipo['nombre']}}</option>
										@else
											<option value="{{$tipo['id']}}">{{$tipo['nombre']}}</option>
										@endif
									@endforeach
								</select>
							</div>

							<div class="form-group col-md-5">
								<label for="etiquetas" class="col-sm-2 control-label">{{ucfirst(trans('master.etiquetas'))}}(*)</label>
								<input type="text" class="form-control" name="etiquetas" id="etiquetas" placeholder="Enter ..." value="{{ $punto['etiquetas'] }}">
							</div>

                            <div class="form-group col-md-2">
                                <label for="visible" class="col-sm-2 control-label">{{ucfirst(trans('master.visible'))}}(*)</label>
                                <select class="form-control select2" name="visible">
                                	@if($punto['visible']==0)
	                                    <option value="0" selected>No visible</option>
    	                                <option value="1">Visible</option>
                            		@else
	                                    <option value="0">No visible</option>
    	                                <option value="1" selected>Visible</option>
    	                            @endif
                                </select>
                            </div>
						</div>

				        <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-12">
										<label for="descripcion" class="control-label">{{ucfirst(trans('master.descripcion'))}}(*)</label>
									</div>
									<div class="col-md-12">
										<textarea  class="form-control" name="descripcion" id="descripcion" placeholder="Breve descripción del punto ..." rows="2">{{ $punto['descripcion'] }}</textarea>
									</div>
								</div>
							</div>
						</div>

				        <div class="row mt-5">
							<div class="col-md-12">
								<h2>{{ucfirst(trans('master.textos'))}}</h2>
							</div>
						</div>

		                @if(isset($punto['textos']) && count($punto['textos'])>0)
		                    @foreach($punto['textos'] as $key=>$texto)
		                        <input type="hidden" name="textos[{{ $texto['id'] }}][id]" value="{{ $texto['id'] }}">
						        <div class="row mt-5">
		                            <div class="col-md-12 border">
		                            	<input type="text" class="form-control" name="textos[{{ $texto['id'] }}][texto]" placeholder="Enter ..." value="{{ $texto['texto'] }}">
	    	                        </div>
	    	                    </div>
						        <div class="row">
			                        <div class="col-md-1">
			                        	<input type="text" class="form-control text-center my-1 mr-sm-2" name="textos[{{ $texto['id'] }}][orden]" placeholder="Enter ..." value="{{ $texto['orden'] }}">
			                        </div>
			                        <div class="col-md-5">
										<select class="custom-select my-1 mr-sm-2" name="textos[{{ $texto['id'] }}][tipo_id]">
											@foreach($tipos['data'] as $tipo)
												@if($tipo['id'] == $texto['tipo_id'])
													<option value="{{$tipo['id']}}" selected>{{$tipo['nombre']}}</option>
												@else
													<option value="{{$tipo['id']}}">{{$tipo['nombre']}}</option>
												@endif
											@endforeach
										</select>
		    	                    </div>
			                        <div class="col-md-4">
									</div>		    	                    
			                        <div class="col-md-2 py-2 center">
			                        	<a class="cajaflex" href="/es/masterTextoBorrar1/{{ $texto['id'] }}"><i class="fa fa-trash fa-2x"></i></a> 
			                        </div>
								</div>
						        <div class="row">
	                            	<div class="form-check form-check-inline my-2">
			                            @for($i=0; $i<=18; $i++)
			                            	<div class="mx-2">
			                            		@if($texto['siglosmarcados'][$i])
													<input class="form-check-input" type="checkbox" name="textos[{{ $texto['id'] }}][siglosmarcados][{{$i}}]" checked>
												@else
													<input class="form-check-input" type="checkbox" name="textos[{{ $texto['id'] }}][siglosmarcados][{{$i}}]">
			                            		@endif
												<label class="form-check-label">{{$punto['siglos']['nombre'][$i]}}</label>
											</div>
			                            @endfor
									</div>
								</div>
		                    @endforeach
		                @endif

				        <div class="row mt-5">
							<div class="col-md-12">
								<h2>{{ucfirst(trans('master.textoNuevo'))}}</h2>
							</div>
						</div>

				        <div class="row mt-5">
                            <div class="col-md-12 border">
                            	<input type="text" class="form-control" name="textonuevo[texto]" placeholder="Enter ..." value="">
	                        </div>
	                    </div>
				        <div class="row">
	                        <div class="col-md-1">
	                        	<input type="text" class="form-control text-center my-1 mr-sm-2" name="textonuevo[orden]" id="ordennuevo" placeholder="Orden..." value="">
	                        </div>

							<div class="form-group col-md-5">
								<select class="custom-select my-1 mr-sm-2" name="textonuevo[tipo_id]">
									<option value="" selected>Choose...</option>
									@foreach($tipos['data'] as $tipo)
										<option value="{{$tipo['id']}}">{{$tipo['nombre']}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">
                        	<div class="form-check form-check-inline my-2">
	                            @for ($i = 0; $i < 18; $i++)
	                            	<div class="mx-2">
											<input class="form-check-input" type="checkbox" name="textonuevo[siglosmarcados][{{ $i }}]">
											<label class="form-check-label">{{$punto['siglos']['nombre'][$i]}}</label>
									</div>
	                            @endfor
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





