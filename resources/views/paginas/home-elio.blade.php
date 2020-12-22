@extends('layouts.frontelio.general')

@section('contentheader_title')
	{{ trans('pagRaiz.raiz_title') }}
@endsection

@section('contentheader_h1')
	{{ trans('pagRaiz.raiz_h1') }}
@endsection

@section('descripcion')
    {{ trans('pagRaiz.raiz_descripcion') }}
@endsection

@section('keywords')
    {{ trans('pagRaiz.raiz_keywords') }}
@endsection

@section('main_content')

<a href="/{{ session('lang') }}/ciudades">Ciudades</a>
<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded" src="/img/ciudad.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="row content h-100">
            <p>{{ trans('pagRaiz.raiz_texto1') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto2') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto3') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto4') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto5') }}</p>
        </div>
    </div>
</section>
@endsection
