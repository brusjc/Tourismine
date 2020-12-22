@extends('layouts.app')

@section('contentheader_title'){{ trans('ciudades.ToledoCatedral_title') }}@endsection

@section('contentheader_h1'){{ trans('ciudades.ToledoCatedral_h1') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1')<a href="{{session('BC1')}}">{{ trans(session('BC1texto')) }}</a>@endsection

@section('breadcrumb2')<a href="{{session('BC2')}}">{{ trans(session('BC2texto')) }}</a>@endsection

@section('breadcrumb3'){{ trans(session('BC3texto')) }}@endsection

@section('descripcion'){{ trans('ciudades.ToledoCatedral_descripcion') }}@endsection

@section('keywords'){{ trans('ciudades.ToledoCatedral_keywords') }}@endsection

@section('main_content')

Estamos en Catedral

@endsection
