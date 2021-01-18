@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('ciudades.Ciudades_title') }}@endsection

@section('contentheader_h1'){{ trans('ciudades.Ciudades_h1') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('descripcion'){{ trans('ciudades.Ciudades_descripcion') }}@endsection

@section('keywords'){{ trans('ciudades.Ciudades_keywords') }}@endsection

@section('main_content')

<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded" src="/img/ciudad21.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid">
        <div class="row content h-100">
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
                                <td><a href='/{{ session("lang") }}/{{ $ciudad["ciudad"] }}'>{{ $ciudad["ciudad"] }}</a></td>
                            </tr>
                        @endforeach        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
