@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('Valencia.ValenciaMercadoC_title') }}@endsection

@section('contentheader_h1'){{ trans('Valencia.ValenciaMercadoC_h1') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">España</a>@endsection

@section('breadcrumb2')<a href="{{session('BC2')}}">Valencia</a>@endsection

@section('breadcrumb3'){{ trans('Valencia.ValenciaMercadoC_breadcrumb') }}@endsection

@section('descripcion'){{ trans('Valencia.ValenciaMercadoC_descripcion') }}@endsection

@section('keywords'){{ trans('Valencia.ValenciaMercadoC_keywords') }}@endsection

@section('main_content')

<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="imgbandera col-md-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-fluid img-rounded w-100" src="/img/Valencia/mercado-central-parada.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <p>{{ trans('Valencia.ValenciaMercadoC_texto1') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto2') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto3') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto4') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto5') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto6') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto7') }}</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-left">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h2>{{ trans('Valencia.ValenciaMercadoC_titulo101') }}</h2>
            </div>
            <div class="col-md-7">
                <p>{{ trans('Valencia.ValenciaMercadoC_texto101') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto102') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto103') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto104') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto105') }}</p>
                <p>{{ trans('Valencia.ValenciaMercadoC_texto106') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/mercado-central-estructura.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-left">
        <div class="row content h-100 text-justify">
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/mercado-central-cupula.jpg" />
                </div>
            </div>
            <div class="col-md-7">
            <p>{{ trans('Valencia.ValenciaMercadoC_texto201') }}</p>
            <p>{{ trans('Valencia.ValenciaMercadoC_texto202') }}</p>
            <p>{{ trans('Valencia.ValenciaMercadoC_texto203') }}</p>
            <p>{{ trans('Valencia.ValenciaMercadoC_texto204') }}</p>
            <p>{{ trans('Valencia.ValenciaMercadoC_texto205') }}</p>
            </div>
        </div>
    </div>
</section>



@endsection
