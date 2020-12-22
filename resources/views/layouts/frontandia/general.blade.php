<!DOCTYPE html>
<html lang="es">

    <head>
        @include('layouts.frontandia.comunes.head')
    </head>

    <body>
    
        @include('layouts.frontandia.comunes.nav')
        @include('layouts.frontandia.comunes.titulo')

        @yield("main_content")
        
        @include('layouts.frontandia.comunes.footer')

        @include('layouts.frontandia.comunes.scripts')

    </body>

</html>