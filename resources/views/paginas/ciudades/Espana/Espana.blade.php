@extends('layouts.frontves.frontves')

@section('contentheader_title'){{ trans('ciudades.Espana_title') }}@endsection

@section('contentheader_h1'){{ trans('ciudades.Espana_h1') }}@endsection

@section('breadcrumb0')<a href="/{{session('lang')}}/">{{ trans('message.home') }}</a>@endsection

@section('breadcrumb1'){{ trans(session('BC1texto')) }}@endsection

@section('descripcion'){{ trans('ciudades.Espana_descripcion') }}@endsection

@section('keywords'){{ trans('ciudades.Espana_keywords') }}@endsection

@section('main_content')

Estamos en españa


@endsection
