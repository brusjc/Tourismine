@extends('adminlte::layouts.app_master')

@section('contentheader_title')
    {{trans('p_home.Title')}}
@endsection

@section('H1')
    {{trans('p_home.H1')}}
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
				</div>
				<form action="/puntos" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

						<div class="form-group">
							<label for="Provincia" class="col-sm-2 control-label">Provincia</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="provincia" id="Provincia">
									<option value="1" selected="selected">Alabama</option>
									<option value="2">Alaska</option>
									<option value="3">California</option>
									<option value="4">Delaware</option>
									<option value="5">Tennessee</option>
									<option value="6">Texas</option>
									<option value="7">Washington</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="Nombre" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Descripcion" class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="descripcion" id="Descripcion" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Leyenda" class="col-sm-2 control-label">Leyenda</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="leyenda" id="Leyenda" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Referencia" class="col-sm-2 control-label">Referencia</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="referencia" id="Referencia" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Telefono" class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="telefono" id="Telefono" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Web" class="col-sm-2 control-label">Web</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="web" id="Web" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Longitud" class="col-sm-2 control-label">Longitud</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="longitud" id="Longitud" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Latitud" class="col-sm-2 control-label">Latitud</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="latitud" id="Latitud" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="Coste" class="col-sm-2 control-label">Coste</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="coste" id="Coste" placeholder="Enter ...">
							</div>
						</div>	

						<div class="form-group">
							<label for="Horario" class="col-sm-2 control-label">Horario</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="horario" id="Horario">
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
							<label for="Tipo" class="col-sm-2 control-label">Tipo</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="tipo" id="Tipo">
									<option value="1" selected="selected">Tipo 1</option>
									<option value="2">Tipo 2</option>
									<option value="3">Tipo 3</option>
									<option value="4">Tipo 4</option>
									<option value="5">Tipo 5</option>
									<option value="6">Tipo 6</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="Puntos" class="col-sm-2 control-label">Puntos</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="puntos" id="Puntos" placeholder="Enter ...">
							</div>
						</div>

					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection





