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
	
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

	<div class="row">
		<div class="col-md-8">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Nuevo punto</h3>
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
											<option value="{{$punto['data']['id']}}" selected>{{$provincia['nombre']}}</option>
										@elseif($provincia['id'] == $punto['data']['provincia_id'])
											<option value="{{$punto['data']['id']}}" selected>{{$provincia['nombre']}}</option>
										@else
											<option value="{{$provincia['id']}}">{{$provincia['nombre']}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="Nombre" class="col-sm-2 control-label">{{trans('punto.Nombre')}}</label>
							<div class="col-sm-7">
								@if({{ old('nombre') }})
									<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Enter ..." value="{{old('nombre')}}">
								@else
									<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Enter ..." value="{{$punto['data']['nombre']}}">
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="col-sm-2 control-label">{{trans('punto.Descripcion')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Enter ..." value="{{ old('descripcion') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="leyenda" class="col-sm-2 control-label">{{trans('punto.Leyenda')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="leyenda" id="leyenda" placeholder="Enter ..." value="{{ old('leyenda') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="referencia" class="col-sm-2 control-label">{{trans('punto.Referencia')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="referencia" id="referencia" placeholder="Enter ..." value="{{ old('referencia') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="telefono" class="col-sm-2 control-label">{{trans('punto.Telefono')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Enter ..." value="{{ old('telefono') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="web" class="col-sm-2 control-label">{{trans('punto.Web')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="web" id="web" placeholder="Enter ..." value="{{ old('web') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="longitud" class="col-sm-2 control-label">{{trans('punto.Longitud')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="longitud" id="longitud" placeholder="Enter ..." value="{{ old('longitud') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="latitud" class="col-sm-2 control-label">{{trans('punto.Latitud')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="latitud" id="latitud" placeholder="Enter ..." value="{{ old('latitud') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="coste" class="col-sm-2 control-label">{{trans('punto.Coste')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="coste" id="coste" placeholder="Enter ..." value="{{ old('coste') }}">
							</div>
						</div>	

						<div class="form-group">
							<label for="horario" class="col-sm-2 control-label">{{trans('punto.Horario')}}</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="horario" id="horario" value="{{ old('horario') }}">
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
										@if($tipo['id'] == old('tipo'))
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
								<input type="text" class="form-control" name="puntos" id="puntos" placeholder="Enter ..." value="{{ old('puntos') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="siglo" class="col-sm-2 control-label">{{trans('punto.Siglos')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="siglo" id="siglo" placeholder="Enter ..." value="{{ old('siglo') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="etiqueta" class="col-sm-2 control-label">{{trans('punto.Etiquetas')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="etiqueta" id="etiqueta" placeholder="Enter ..." value="{{ old('etiqueta') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="curiosidades" class="col-sm-2 control-label">{{trans('punto.Curiosidades')}}</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="curiosidades" id="curiosidades" placeholder="Enter ..." value="{{ old('curiosidades') }}">
							</div>
						</div>

					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right">{{trans('punto.Modificar')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection





