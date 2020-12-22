@extends('layouts.frontandia.general')

@section('contentheader_title'){{ trans('Toledo.Toledo_title') }}@endsection

@section('contentheader_h1'){{ trans('Toledo.Toledo_h1') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">{{ trans(session('BC1texto')) }}</a>@endsection

@section('breadcrumb2'){{ trans(session('BC2texto')) }}@endsection

@section('descripcion'){{ trans('Toledo.Toledo_descripcion') }}@endsection

@section('keywords'){{ trans('Toledo.Toledo_keywords') }}@endsection

@section('main_content')

<section>
    <div class="call-to-action-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 call-to-action section-description wow fadeInLeftBig img-horizontal">
                    <img class="img-responsive img-rounded" src="/img/Toledo/Toledo.jpg" />
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
