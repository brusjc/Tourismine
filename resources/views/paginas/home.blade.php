@extends('layouts.app')

@section('contentheader_title')
	{{ html_entity_decode(trans('pagRaiz.raiz_title') )}}
@endsection

@section('contentheader_h1')
	{{ html_entity_decode(trans('pagRaiz.raiz_h1') )}}
@endsection

@section('descripcion')
    {{ html_entity_decode(trans('pagRaiz.raiz_descripcion') )}}
@endsection

@section('keywords')
    {{ html_entity_decode(trans('pagRaiz.raiz_keywords') )}}
@endsection

@section('main_content')

    <div class="comment-text">
        <p>{{ html_entity_decode(trans('pagRaiz.raiz_texto1') )}}</p>
        <p>{{ html_entity_decode(trans('pagRaiz.raiz_texto2') )}}</p>
        <p>{{ html_entity_decode(trans('pagRaiz.raiz_texto3') )}}</p>
        <p>{{ html_entity_decode(trans('pagRaiz.raiz_texto4') )}}</p>
        <p>{{ html_entity_decode(trans('pagRaiz.raiz_texto5') )}}</p>
    </div>


@endsection
