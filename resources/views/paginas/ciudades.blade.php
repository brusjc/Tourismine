@extends('layouts.app')

@section('contentheader_title')
	{{ html_entity_decode(trans('pagMaster.master_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagRaiz.master_h1') )}}
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.master_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.master_keywords') )}}
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <table class="table table-bordered">
                    <tr>
                        <th>Estado</th>
                        <th>Provincia</th>
                        <th>Ciudad</th>
                    </tr>
                    @foreach($ciudades as $ciudad)
                        <tr>
                            <td>{{$ciudad['estado']}}</td>
                            <td>{{$ciudad['provincia']}}</td>
                            <td>{{$ciudad['ciudad']}}</td>
                        </tr>
                    @endforeach        
                </table>
            </div>
        </div>
    </div> 
@endsection
