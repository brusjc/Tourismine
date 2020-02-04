<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

        @include('adminlte::layouts.partials.mainheader')

        @include('adminlte::layouts.partials.sidebar')

        <div class="content-wrapper">

            @include('adminlte::layouts.partials.contentheader')

            <section class="content">
                @yield('content')
                @include('adminlte::layouts.partials.tabla_examen_master')
                @include('adminlte::layouts.partials.tabla_codigos')
                @include('adminlte::layouts.partials.tabla_pruebas')
                @include('adminlte::layouts.partials.tabla_examenes')
            </section>
        </div>

        @include('adminlte::layouts.partials.controlsidebar')

        @include('adminlte::layouts.partials.footer')

    </div>
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>
