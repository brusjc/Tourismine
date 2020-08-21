@extends('layouts.app')

@section('contentheader_title')
	{{ html_entity_decode(trans('pagRaiz.raiz_title') )}}
@endsection

@section('contentheader_h1')
    clientes   
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.raiz_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.raiz_keywords') )}}
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
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
                <form action="{{url('/oauth/clients')}}" method="POST" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="redirect" class="col-sm-2 control-label">redireccion</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="redirect" id="redirect">
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">{{trans('pagMaster.Guardar')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="box">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 5%">id</th>
                        <th>nombre</th>
                        <th>redirect</th>
                        <th>secret</th>
                    </tr>
                    @foreach($clients as $key1=>$client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->redirect}}</td>
                            <td>{{$client->secret}}</td>
                        </tr>
                    @endforeach        
                </table>
            </div>
        </div>
    </div> 


@endsection
