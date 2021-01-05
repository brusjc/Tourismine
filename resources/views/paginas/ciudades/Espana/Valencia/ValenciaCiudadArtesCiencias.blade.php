@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('Valencia.CAC_title') }}@endsection

@section('contentheader_h1'){{ trans('Valencia.CAC_h1') }}@endsection

@section('contentheader_frase'){{ trans('Valencia.CAC_frase') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">España</a>@endsection

@section('breadcrumb2')<a href="{{session('BC2')}}">Valencia</a>@endsection

@section('breadcrumb3'){{ trans('Valencia.CAC_breadcrumb') }}@endsection

@section('descripcion'){{ trans('Valencia.CAC_descripcion') }}@endsection

@section('keywords'){{ trans('Valencia.CAC_keywords') }}@endsection

@section('main_content')

<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="imgbandera col-md-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-fluid img-rounded w-100" src="/img/Valencia/Valencia-Ciudad-artes-ciencias.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <p>{{ trans('Valencia.CAC_texto1') }}</p>
                <p>{{ trans('Valencia.CAC_texto2') }}</p>
                <p>{{ trans('Valencia.CAC_texto3') }}</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-left">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h2>{{ trans('Valencia.CAC_titulo100') }}</h2>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo101') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto101') }}</p>
                <p>{{ trans('Valencia.CAC_texto102') }}</p>
                <p>{{ trans('Valencia.CAC_texto103') }}</p>
                <p>{{ trans('Valencia.CAC_texto104') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Ciudad_de_las-Artes-y_las-Ciencias-nocturna.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo102') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto121') }}</p>
                <p>{{ trans('Valencia.CAC_texto122') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Ciudad_de_las-Artes-y_las-Ciencias-puerta.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo103') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto141') }}</p>
                <p>{{ trans('Valencia.CAC_texto142') }}</p>
                <p>{{ trans('Valencia.CAC_texto143') }}</p>
                <p>{{ trans('Valencia.CAC_texto144') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Ciudad-Artes-Ciencias-Umbracle-exterior.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo104') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto161') }}</p>
                <p>{{ trans('Valencia.CAC_texto162') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Ciudad-Artes-Ciencias-Museo-Principe-Felipe.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-left">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h2>{{ trans('Valencia.CAC_titulo200') }}</h2>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo220') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto221') }}</p>
                <p>{{ trans('Valencia.CAC_texto222') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Hemisferic.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo240') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto241') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Museo-Ciencias-Príncipe-Felipe.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo260') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto261') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Umbracle.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo280') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto281') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Oceanografico.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo300') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto301') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Palacio-Artes-Reina-Sofia.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo320') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto321') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Puente-Assut-Or.jpg" />
                </div>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h3>{{ trans('Valencia.CAC_titulo340') }}</h3>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.CAC_texto341') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/valencia-Agora.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="imgbandera col-md-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-fluid img-rounded w-100" src="/img/Valencia/Valencia-Ciudad-Artes-Ciencias.vista-general.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
