@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('Valencia.ValenciaLonja_title') }}@endsection

@section('contentheader_h1'){{ trans('Valencia.ValenciaLonja_h1') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">{{ trans(session('BC1texto')) }}</a>@endsection

@section('breadcrumb2')<a href="{{session('BC2')}}">{{ trans(session('BC2texto')) }}</a>@endsection

@section('breadcrumb3'){{ trans(session('BC3texto')) }}@endsection

@section('descripcion'){{ trans('Valencia.ValenciaLonja_descripcion') }}@endsection

@section('keywords'){{ trans('Valencia.ValenciaLonja_keywords') }}@endsection

@section('main_content')

<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded" src="/img/Valencia/lonja-de-la-seda-columna.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid text-left">
        <div class="row content h-100">
            <p>{{ trans('Valencia.ValenciaLonja_texto1') }}</p>
            <p>{!! trans('Valencia.ValenciaLonja_texto2') !!}</p>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid text-left">
        <div class="row content h-100">
            <h2>{{ trans('Valencia.ValenciaLonja_titulo1') }}</h2>
            <div class="col-md-7 pt-5 order-2">
                <p>{{ trans('Valencia.ValenciaLonja_texto101') }}</p>
                <p>{{ trans('Valencia.ValenciaLonja_texto102') }}</p>
                <p>{!! trans('Valencia.ValenciaLonja_texto103') !!}</p>
                <p>{{ trans('Valencia.ValenciaLonja_texto104') }}</p>
                <p>{{ trans('Valencia.ValenciaLonja_texto105') }}</p>
                <p>{{ trans('Valencia.ValenciaLonja_texto106') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/valencia/fachada_lonja_de_la_seda_valencia.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid text-left">
        <div class="row content h-100">
            <h2>{{ trans('Valencia.ValenciaLonja_titulo2') }}</h2>
            <p>{{ trans('Valencia.ValenciaLonja_texto201') }}</p>
            <p>{!! trans('Valencia.ValenciaLonja_texto202') !!}</p>
            <ul>
                <li>{{ trans('Valencia.ValenciaLonja_texto203') }}</li>
                <li>{{ trans('Valencia.ValenciaLonja_texto204') }}</li>
                <li>{{ trans('Valencia.ValenciaLonja_texto205') }}</li>
                <li>{{ trans('Valencia.ValenciaLonja_texto206') }}</li>
            </ul>
            <p>{{ trans('Valencia.ValenciaLonja_texto207') }}</p>
            <p>{{ trans('Valencia.ValenciaLonja_texto208') }}</p>
            <p>{{ trans('Valencia.ValenciaLonja_texto209') }}</p>
            <p>{{ trans('Valencia.ValenciaLonja_texto210') }}</p>
            <p>{{ trans('Valencia.ValenciaLonja_texto211') }}</p>
        </div>
    </div>
</section>




@endsection
