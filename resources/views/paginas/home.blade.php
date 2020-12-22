@extends('layouts.frontandia.general')

@section('contentheader_title')
	{{ trans('home.home_title') }}
@endsection

@section('contentheader_h1')
	{{ trans('home.home_h1') }}
@endsection

@section('descripcion')
    {{ trans('home.home_descripcion') }}
@endsection

@section('keywords')
    {{ trans('home.home_keywords') }}
@endsection

@section('main_content')

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

<section class="my-5">
    <div class="container-fluid">
        <div class="row content h-100">
            <p>{{ trans('home.home_texto1') }}</p>
            <p>{{ trans('home.home_texto2') }}</p>
            <p>{{ trans('home.home_texto3') }}</p>
            <p>{{ trans('home.home_texto4') }}</p>
            <p>{{ trans('home.home_texto5') }}</p>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="services-container">
        <div class="container">
            <div class="row">
                <h2>{{ trans('home.home_titulo100') }}</h2>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="service wow fadeInUp">
                        <div class="service-icon"><i class="fa fa-map-marker"></i></div>
                        <h3>{{ trans('home.home_titulo101') }}</h3>
                        <p>{{ trans('home.home_texto101') }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="service wow fadeInDown">
                        <div class="service-icon"><i class="fa fa-headphones"></i></div>
                        <h3>{{ trans('home.home_titulo102') }}</h3>
                        <p>{{ trans('home.home_texto102') }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="service wow fadeInUp">
                        <div class="service-icon"><i class="fa fa-street-view"></i></div>
                        <h3>{{ trans('home.home_titulo103') }}</h3>
                        <p>{{ trans('home.home_texto103') }}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="service wow fadeInDown">
                        <div class="service-icon"><i class="fa fa-chain-broken"></i></div>
                        <h3>{{ trans('home.home_titulo104') }}</h3>
                        <p>{{ trans('home.home_texto104') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
