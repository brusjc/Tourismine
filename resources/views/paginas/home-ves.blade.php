@extends('layouts.frontves.frontves')

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

<section>
    <div class="container-fluid">
        <div class="comment-text">
            <p>{{ trans('pagRaiz.raiz_texto1') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto2') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto3') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto4') }}</p>
            <p>{{ trans('pagRaiz.raiz_texto5') }}</p>
        </div>
    </div>
</section>
@endsection
