<!DOCTYPE html>
<html lang="en">

    <head>
        @include('layouts.frontelio.comunes.head')
    </head>

    <body>
    
        @include('layouts.frontelio.comunes.nav')
        @include('layouts.frontelio.comunes.titulo')

        @yield("main_content")

        
        @include('layouts.frontelio.comunes.footer')

        @include('layouts.frontelio.comunes.scripts')

    </body>

</html>