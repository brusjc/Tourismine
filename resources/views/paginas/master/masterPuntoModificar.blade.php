@extends('adminlte::layouts.app_master')

@section('contentheader_title')
    {{trans('p_masterPuntoModificar.Title')}}
@endsection

@section('H1')
    {{trans('p_masterPuntoModificar.H1')}}
@endsection

@section('descripcion')
    "Todos los examenes"
@endsection

@section('keywords')
    "Examenes"
@endsection

@section('content')
	<p>esto es una prueba de cómo funciona la app</p>
	
	<div class="row">
		<div class="col-md-8">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Modificar punto</h3>
					@if(count($errors) > 0)
						<div class="callout callout-info">
							<div class="errors">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif
				</div>
				<form action="/masterPuntoModificar2/{{$punto['data']['id']}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">
						<div class="form-group">
							<label for="provincia" class="col-sm-2 control-label">{{trans('punto.Provincia')}}</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="provincia" id="provincia">
									@foreach($provincias['data'] as $provincia)
										@if($provincia['id'] == old('provincia'))
											<option value="{{$provincia['id']}}" selected>{{$provincia['nombre']}}</option>
										@elseif($provincia['id'] == $punto['data']['provincia_id'])
											<option value="{{$provincia['id']}}" selected>{{$provincia['nombre']}}</option>
										@else
											<option value="{{$provincia['id']}}">{{$provincia['nombre']}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="Nombre" class="col-sm-2 control-label">
								{{trans('punto.Nombre')}}
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Enter ..." value="{{$punto['data']['nombre']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="col-sm-2 control-label">{{trans('punto.Descripcion')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Enter ..." value="{{$punto['data']['descripcion']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="leyenda" class="col-sm-2 control-label">{{trans('punto.Leyenda')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="leyenda" id="leyenda" placeholder="Enter ..." value="{{$punto['data']['leyenda']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="referencia" class="col-sm-2 control-label">{{trans('punto.Referencia')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="referencia" id="referencia" placeholder="Enter ..." value="{{$punto['data']['referencia']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="telefono" class="col-sm-2 control-label">{{trans('punto.Telefono')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Enter ..." value="{{$punto['data']['telefono']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="web" class="col-sm-2 control-label">{{trans('punto.Web')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="web" id="web" placeholder="Enter ..." value="{{$punto['data']['web']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="longitud" class="col-sm-2 control-label">{{trans('punto.Longitud')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="longitud" id="longitud" placeholder="Enter ..." value="{{$punto['data']['longitud']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="latitud" class="col-sm-2 control-label">{{trans('punto.Latitud')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="latitud" id="latitud" placeholder="Enter ..." value="{{$punto['data']['latitud']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="coste" class="col-sm-2 control-label">{{trans('punto.Coste')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="coste" id="coste" placeholder="Enter ..." value="{{$punto['data']['coste']}}">
							</div>
						</div>	

						<div class="form-group">
							<label for="horario" class="col-sm-2 control-label">{{trans('punto.Horario')}}</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="horario" id="horario" value="{{$punto['data']['horario_id']}}">
									<option value="1" selected="selected">Horario 1</option>
									<option value="2">Horario 2</option>
									<option value="3">Horario 3</option>
									<option value="4">Horario 4</option>
									<option value="5">Horario 5</option>
									<option value="6">Horario 6</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="tipo" class="col-sm-2 control-label">{{trans('punto.Tipo')}}</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="tipo" id="tipo">
									@foreach($tipos['data'] as $tipo)
										@if($tipo['id'] == $punto['data']['tipo'])
											<option value="{{$tipo['id']}}" selected>{{$tipo['nombre']}}</option>
										@else
											<option value="{{$tipo['id']}}">{{$tipo['nombre']}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="puntos" class="col-sm-2 control-label">{{trans('punto.Puntos')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="puntos" id="puntos" placeholder="Enter ..." value="{{$punto['data']['puntos']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="siglo" class="col-sm-2 control-label">{{trans('punto.Siglos')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="siglo" id="siglo" placeholder="Enter ..." value="{{$punto['data']['siglo']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="etiqueta" class="col-sm-2 control-label">{{trans('punto.Etiquetas')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="etiqueta" id="etiqueta" placeholder="Enter ..." value="{{$punto['data']['etiquetas']}}">
							</div>
						</div>

						<div class="form-group">
							<label for="curiosidades" class="col-sm-2 control-label">{{trans('punto.Curiosidades')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="curiosidades" id="curiosidades" placeholder="Enter ..." value="{{$punto['data']['curiosidades']}}">
							</div>
						</div>
						
						<input type="hidden" class="form-control" name="id" id="curiosidades" placeholder="Enter ..." value="{{$punto['data']['id']}}">
					</div>

					<div class="box-footer">
						<a href="/master"  class="btn btn-info pull-left">Volver</a>
						<button type="submit" class="btn btn-info pull-right">{{trans('punto.Modificar')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection





