@extends('adminlte::layouts.master_examenes')

@section('contentheader_title')
	{{trans('adminlte_lang::message.informacion_examen_master')}}
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
@endsection

@if(!is_null($miprueba['data']))
	@section('tablamiexamen')
		@foreach($miprueba['data'] as $key1=>$area)
	        <tr>
	            <td colspan="2"><h2>{{$area['temanombre']['nombre']}}</h2></td>
	            <td></td>
	            <td></td>
	        </tr>
			@foreach($area['subtema'] as $key2=>$subarea)
		        <tr>
		            <td></td>
		            <td><h3>{{$area['subtemanombre'][$key2]['nombre']}}</h3></td>
		            <td></td>
		            <td></td>
		        </tr>
				@foreach($subarea['preguntas']['data'] as $key3=>$pregunta)
			        <tr>
			            <td colspan="4">
							<div class="row">
								<div class="col-md-12">
									<div class="box box-default collapsed-box">
										<div class="box-header with-border">
											<div class="box-title">
												{{$pregunta['orden']}}.-{{$pregunta['pregunta']}}
											</div>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse">
													<i class="fa fa-plus"></i>
												</button>
											</div>  <!-- /.box-tools -->
										</div>  <!-- /.box-header -->
										<div class="box-body">
											<ul>
												@foreach($pregunta['respuesta'] as $key4=>$respuesta)
													<li>{{$respuesta['respuesta']}}</li>
												@endforeach
												Valor del error={{$pregunta['error']}} --- Acierto={{$pregunta['acierto']}}
											</ul>
										</div>  <!-- /.box-body -->
									</div>  <!-- /.box -->
								</div>  <!-- /.col -->
							</div>  <!-- /.row -->
			            </td>
			        </tr>
				@endforeach        
			@endforeach        
		@endforeach        
	@endsection
@endif





