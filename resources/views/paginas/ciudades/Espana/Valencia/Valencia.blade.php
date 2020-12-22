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
    <div class="container-fluid text-left">
        <div class="row content h-100">
            <p>{{ trans('Valencia.Valencia_texto1') }}</p>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid text-left">
        <div class="row content h-100">
            <h2>{{ trans('Valencia.Valencia_titulo1') }}</h2>
        </div 
        <div class="row content h-100">
            <div class="col-md-7 pt-5">
                <p>{{ trans('Valencia.Valencia_texto2') }}</p>
                <p>{{ trans('Valencia.Valencia_texto3') }}</p>
                <p>{{ trans('Valencia.Valencia_texto4') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo  pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/valencia/ciudad-de-las-artes-y-las-ciencias-valencia.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid text-left">
        <div class="row content">
            <h2>{{ trans('Valencia.Valencia_titulo2') }}</h2>
        </div 
        <div class="row content h-100">
            <div class="col-md-12 pt-5 text-left">
                <p>{{ trans('Valencia.Valencia_texto101') }}</p>
                <p>{{ trans('Valencia.Valencia_texto102') }}</p>
                <p>{{ trans('Valencia.Valencia_texto103') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container-fluid text-left">
        <div class="row content h-100">
            <div class="col-md-5 pt-5">
                <img class="img-responsive img-rounded w-100" src="/img/valencia/valencia-fallas.jpg" />
            </div>
            <div class="col-md-7 pt-5 text-left">
                <p>{{ trans('Valencia.Valencia_texto104') }}</p>
                <p>{{ trans('Valencia.Valencia_texto105') }}</p>
                <p>{{ trans('Valencia.Valencia_texto106') }}</p>
                <p>{{ trans('Valencia.Valencia_texto107') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="services-full-width-container mt-5">
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded w-100" src="/img/valencia/valencia-ciudad-ciencias-fachada.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services mt-5">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ trans('ciudades.PuntoInteres') }}</h2>
            <p>{{ trans('Valencia.Valencia_texto201') }}</p>
        </div>
       <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <a href="/{{ session('lang') }}/Valencia-lonja-seda">
                        <span class="glyphicon glyphicon-camera"></span>
                        <i class="fa fa-user"></i>
                        <h4 class="title">{{ trans('Valencia.ValenciaLonja_h1') }}</h4>
                        <p class="description">{{ trans('Valencia.ValenciaLonja_enlace1') }}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <a href="/{{ session('lang') }}/Valencia-mercado-central">
                        <span class="glyphicon glyphicon-camera"></span>
                        <i class="fa fa-user"></i>
                        <h4 class="title">{{ trans('Valencia.ValenciaMercadoC_h1') }}</h4>
                        <p class="description">{{ trans('Valencia.ValenciaMercadoC_enlace1') }}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4 class="title"><a href="">Magni Dolores</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4 class="title"><a href="">Nemo Enim</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
