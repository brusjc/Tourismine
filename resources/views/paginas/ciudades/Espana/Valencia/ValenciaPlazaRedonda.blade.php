@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('Valencia.Redonda_title') }}@endsection

@section('contentheader_h1'){{ trans('Valencia.Redonda_h1') }}@endsection

@section('contentheader_frase'){{ trans('Valencia.Redonda_frase') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">España</a>@endsection

@section('breadcrumb2')<a href="{{session('BC2')}}">Valencia</a>@endsection

@section('breadcrumb3'){{ trans('Valencia.Redonda_breadcrumb') }}@endsection

@section('descripcion'){{ trans('Valencia.Redonda_descripcion') }}@endsection

@section('keywords'){{ trans('Valencia.Redonda_keywords') }}@endsection

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
                <p>{{ trans('Valencia.Redonda_texto1') }}</p>
                <p>{{ trans('Valencia.Redonda_texto2') }}</p>
                <p>{{ trans('Valencia.Redonda_texto3') }}</p>
                <p>{{ trans('Valencia.Redonda_texto4') }}</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-left">
        <div class="row content h-100 text-justify">
            <div class="col-md-12">
                <h2>{{ trans('Valencia.Redonda_titulo100') }}</h2>
            </div>
        </div>
        <div class="row content h-100 text-justify">
            <div class="col-md-7">
                <p>{{ trans('Valencia.Redonda_texto101') }}</p>
                <p>{{ trans('Valencia.Redonda_texto102') }}</p>
                <p>{{ trans('Valencia.Redonda_texto103') }}</p>
                <p>{{ trans('Valencia.Redonda_texto104') }}</p>
            </div>
            <div class="col-md-5">
                <div class="img-redondo pt-5 mx-3 mv-3">
                    <img class="img-responsive img-rounded" src="/img/Valencia/Valencia-Ciudad_de_las-Artes-y_las-Ciencias-nocturna.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
