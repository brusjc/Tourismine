@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ html_entity_decode(trans('master.masterNuevo_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagRaiz.masterNuevo_h1') )}}
@endsection

@section('breadcrumb1')
	<a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.masterNuevo_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.masterNuevo_keywords') )}}
@endsection

@section('main_content')

<section>
    <div class="container">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						@if(count($errors) > 0)
							<div class="callout callout-info">
								<div class="errors">
									<ul>
										@foreach($errors as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section>
    <div class="container">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
				<form action="/es/masterPuntoNuevo2" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="Nombre" class="control-label">{{trans('master.Nombre')}}(*)</label>
                                <input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Enter ..."  value="{{ old('nombre') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ciudad_id" class="control-label">{{trans('master.Ciudad')}}(*)</label>
                                <select class="form-control select2" name="ciudad_id" id="ciudad_id">
                                    <option value="" selected></option>
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
                                <label for="direccion" class="control-label">{{trans('master.direccion')}}(*)</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Calle ..." value="{{ old('direccion') }}">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="cpostal" class="control-label">{{trans('master.cpostal')}}(*)</label>
                                <input type="text" class="form-control" name="cpostal" id="cpostal" placeholder="Código postal ..." value="{{ old('cpostal') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="telefono" class="control-label">{{trans('master.Telefono')}}(*)</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="000 000000000 ..." value="{{ old('telefono') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="web" class="control-label">{{trans('master.Web')}}(*)</label>
                                <input type="text" class="form-control" name="web" id="web" placeholder="www ..." value="{{ old('web') }}">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="latitud" class="control-label">{{trans('master.Latitud')}}(*)</label>
                                <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Enter ..." value="{{ old('latitud') }}">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="longitud" class="control-label">{{trans('master.Longitud')}}(*)</label>
                                <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Enter ..." value="{{ old('longitud') }}">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="puntos" class="col-sm-2 control-label">{{trans('master.Puntuacion')}}(*)</label>
                                <input type="text" class="form-control" name="puntos" id="puntos" placeholder="1 a 10 ..." value="{{ old('puntos') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="horario_id" class="control-label">{{trans('master.Horario')}}</label>
                                <select class="form-control select2" name="horario_id" id="horario_id" value="{{ old('horario') }}">
                                    <option value="1" selected="selected">Horario 1</option>
                                    <option value="2">Horario 2</option>
                                    <option value="3">Horario 3</option>
                                    <option value="4">Horario 4</option>
                                    <option value="5">Horario 5</option>
                                    <option value="6">Horario 6</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="tipo_id" class="col-sm-2 control-label">{{trans('master.Tipo')}}(*)</label>
                                <select class="form-control select2" name="tipo_id" id="tipo_id">
                                    <option value=""> </option>
                                    @foreach($tipos['data'] as $tipo)
                                        @if($tipo['id'] == old('tipo'))
                                            <option value="{{$tipo['id']}}" selected>{{$tipo['nombre']}}</option>
                                        @else
                                            <option value="{{$tipo['id']}}">{{$tipo['nombre']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-7">
                                <label for="etiquetas" class="col-sm-2 control-label">{{trans('master.Etiquetas')}}(*)</label>
                                <input type="text" class="form-control" name="etiquetas" id="etiquetas" placeholder="Enter ..." value="{{ old('etiquetas') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="descripcion" class="control-label">{{trans('master.Descripcion')}}(*)</label>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" name="descripcion" id="descripcion" placeholder="Breve descripción del punto ..." value="{{ old('descripcion') }}" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="box-footer">
							<a href="/es/master" class="btn btn-info pull-left">Volver</a>
							<button type="submit" class="btn btn-info pull-right">{{trans('master.Guardar')}}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
