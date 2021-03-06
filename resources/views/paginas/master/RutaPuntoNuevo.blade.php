@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ html_entity_decode(trans('master.RutaPuntoNuevo_title') )}}{{$ruta['nombre']}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagRaiz.RutaPuntoNuevo_h1') )}}{{$ruta['nombre']}}
@endsection

@section('breadcrumb1')
    <a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>
@endsection

@section('breadcrumb2')
    <a href="/es/rutas/{{$id}}">{{ trans('master.masterRutas_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.RutaPuntoNuevo_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.RutaPuntoNuevo_keywords') )}}
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
            <div class="col-md-6">
				<form action="/es/ruta-punto-nuevo2/{{$id}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

                        <input type="hidden" class="form-control" name="id" value="{{$id}}">
                        <input type="hidden" class="form-control" name="ciudad_id" value="{{$puntos[0]['ciudad_id']}}">

				        <div class="row">
							<div class="form-group col-md-11">
								<label for="punto_id" class="control-label">{{ucfirst(trans('master.punto'))}}(*)</label>
								<select class="form-control select2" name="punto_id" id="punto_id">
									@foreach($puntos as $punto)
										@if($punto['id'] == old('punto_id'))
											<option value="{{$punto['id']}}" selected>{{$punto['nombre']}}</option>
										@else
											<option value="{{$punto['id']}}">{{$punto['nombre']}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

				        <div class="row">
							<div class="form-group col-md-2">
								<label for="orden" class="col-sm-2 control-label">{{ucfirst(trans('master.orden'))}}(*)</label>
								<input type="text" class="form-control" name="orden" placeholder="Enter ..." value="">
							</div>
						</div>
                        
                        <div class="box-footer my-5">
                            <a href="/es/rutas/{{$id}}" class="btn btn-info pull-left">{{ucfirst(trans('master.volver'))}}</a>
                            <button type="submit" class="btn btn-info pull-right">{{ucfirst(trans('master.actualizar'))}}</button>
                        </div>

					</div>
				</form>
			</div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Puntos de la ruta</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 15px">Orden</th>
                                <th>Punto</th>
                                <th style="width: 15px"><i class="fa fa-edit"></i></th>
                            </tr>
                            @foreach($puntosorden as $key=>$mipunto)
                                <tr>
                                    @if($key>0 && $puntosorden[$key]['orden']==$puntosorden[$key-1]['orden'])
                                        <td class="text-danger font-weight-bold">{{$mipunto['orden']}}</td>
                                        <td class="text-danger font-weight-bold">{{$mipunto['punto']['nombre']}}</td>
                                        <td><a href="/es/ruta-punto-modificar/{{$mipunto['id']}}"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="/es/ruta-punto-borrar1/{{$mipunto['id']}}"><i class="fa fa-trash"></i></a></td>
                                    @else
                                        <td>{{$mipunto['orden']}}</td>
                                        <td>{{$mipunto['punto']['nombre']}}</td>
                                        <td><a href="/es/ruta-punto-modificar/{{$mipunto['id']}}"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="/es/ruta-punto-borrar1/{{$mipunto['id']}}"><i class="fa fa-trash"></i></a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>


@endsection





