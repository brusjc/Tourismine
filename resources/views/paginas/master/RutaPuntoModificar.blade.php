@extends('layouts.frontAdmin.general')

@section('contentheader_title')
	{{ html_entity_decode(trans('master.RutaPuntoMdificar_title') )}}{{$punto['ruta']['nombre']}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagRaiz.RutaPuntoMdificar_h1') )}}{{$punto['ruta']['nombre']}}
@endsection

@section('breadcrumb1')
    <a href="/es/master">{{ trans('master.master_breadcrumb') }}</a>
@endsection

@section('breadcrumb2')
    <a href="/es/rutas/{{$id}}">{{ trans('master.masterRutas_breadcrumb') }}</a>
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.RutaPuntoMdificar_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.RutaPuntoMdificar_keywords') )}}
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
				<form action="/es/ruta-punto-modificar2/{{$id}}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="box-body">

                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="hidden" name="ciudad_id" value="{{$puntos[0]['ciudad_id']}}">
                        <input type="hidden" name="ruta_id" value="{{$punto['ruta_id']}}">
                        <input type="hidden" name="punto_id" value="{{$punto['punto_id']}}">
                        <input type="hidden" name="orden_old" value="{{$punto['orden']}}">

				        <div class="row">
							<div class="form-group col-md-11">
								<label for="puntonombre" class="control-label">{{ucfirst(trans('master.punto'))}}(*)</label>
                                <input type="text" class="form-control" name="puntonombre" placeholder="Enter ..." value="{{$punto['punto']['nombre']}}">
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
                                <th style="width: 15px"><i class="fa fa-trash"></i></th>
                            </tr>
                            @foreach($puntosorden as $key=>$mipunto)
                                <tr>
                                    @if($key>0 && $puntosorden[$key]['orden']==$puntosorden[$key-1]['orden'])
                                        <td class="text-danger font-weight-bold">{{$mipunto['orden']}}</td>
                                        <td class="text-danger font-weight-bold">{{$mipunto['punto']['nombre']}}</td>
                                        <td><a href="/es/ruta-punto-modificar/{{$mipunto['id']}}"><i class="fa fa-edit"></i></a></td>
                                        <td><i class="fa fa-edit"></i></td>
                                        <td><i class="fa fa-trash"></i></td>
                                    @else
                                        <td>{{$mipunto['orden']}}</td>
                                        <td>{{$mipunto['punto']['nombre']}}</td>
                                        <td><a href="/es/ruta-punto-modificar/{{$mipunto['id']}}"><i class="fa fa-edit"></i></a></td>
                                        <td><i class="fa fa-trash"></i></td>
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





