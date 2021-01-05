@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('Valencia.Valencia_title') }}@endsection

@section('contentheader_h1'){{ trans('Valencia.Valencia_h1') }}@endsection

@section('contentheader_frase'){{ trans('Valencia.Valencia_frase') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">{{ trans(session('BC1texto')) }}</a>@endsection

@section('breadcrumb2'){{ trans(session('BC2texto')) }}@endsection

@section('descripcion'){{ trans('Valencia.Valencia_descripcion') }}@endsection

@section('keywords'){{ trans('Valencia.Valencia_keywords') }}@endsection

@section('main_content')

<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <p>{{ trans('Valencia.Valencia_texto1') }}</p>
                <p>{{ trans('Valencia.Valencia_texto2') }}</p>
                <p>{{ trans('Valencia.Valencia_texto3') }}</p>
                <p>{{ trans('Valencia.Valencia_texto4') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h2>{{ trans('Valencia.Valencia_titulo100') }}</h2>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7 pt-5">
                <p>{{ trans('Valencia.Valencia_texto101') }}</p>
                <p>{{ trans('Valencia.Valencia_texto102') }}</p>
                <p>{{ trans('Valencia.Valencia_texto103') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo  pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Torres-Serranos.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid">
        <div class="row content text-justify">
            <div class="col-md-12">
                <h2>{{ trans('Valencia.Valencia_titulo200') }}</h2>
            </div>
        </div> 
        <div class="row content h-100 text-justify">
            <div class="col-md-12 pt-5">
                <p>{{ trans('Valencia.Valencia_texto201') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid">
        <div class="row content h-100 text-justify">
            <div class="col-md-5 pt-5">
                <img class="img-responsive img-rounded w-100" src="/img/Valencia/valencia-fallas.jpg" />
            </div>
            <div class="col-md-7 pt-5 text-left">
                <p>{{ trans('Valencia.Valencia_texto202') }}</p>
                <p>{{ trans('Valencia.Valencia_texto203') }}</p>
                <p>{{ trans('Valencia.Valencia_texto204') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="services-full-width-container mt-5">
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded w-100" src="/img/Valencia/valencia-ciudad-ciencias-fachada.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="presentation-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInLeftBig">
                    <h2><span class="violet">{{ trans('ciudades.PuntosInteres') }}</span></h2>
                    <p>{{ trans('Valencia.Valencia_texto301') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="services-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service wow fadeInUp">
                        <a href="/{{ session('lang') }}/Valencia-lonja-seda">
                            <div class="service-icon"><i class="fa fa-eye"></i></div>
                            <h4 class="title">{{ trans('Valencia.ValenciaLonja_h1') }}</h4>
                            <p class="description ">{{ trans('Valencia.ValenciaLonja_enlace1') }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service wow fadeInUp">
                        <a href="/{{ session('lang') }}/Valencia-mercado-central">
                            <div class="service-icon"><i class="fa fa-eye"></i></div>
                            <h4 class="title">{{ trans('Valencia.ValenciaMercadoC_breadcrumb') }}</h4>
                            <p class="description">{{ trans('Valencia.ValenciaMercadoC_enlace1') }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service wow fadeInUp">
                        <a href="/{{ session('lang') }}/Valencia-Ciudad-Artes-Ciencias">
                            <div class="service-icon"><i class="fa fa-eye"></i></div>
                            <h4 class="title">{{ trans('Valencia.CAC_breadcrumb') }}</h4>
                            <p class="description">{{ trans('Valencia.CAC_enlace1') }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service wow fadeInUp">
                        <a href="/{{ session('lang') }}/Valencia-Plaza-Redonda">
                            <div class="service-icon"><i class="fa fa-eye"></i></div>
                            <h4 class="title">{{ trans('Valencia.Redonda_breadcrumb') }}</h4>
                            <p class="description">{{ trans('Valencia.Redonda_enlace1') }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
