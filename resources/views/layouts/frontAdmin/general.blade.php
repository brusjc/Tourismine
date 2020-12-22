<!DOCTYPE html>
<head>
  @include('layouts.frontAdmin.comunes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include('layouts.frontAdmin.comunes.nav')
    @include('layouts.frontAdmin.comunes.sidebar')
    <div class="content-wrapper">
      @include('layouts.frontAdmin.comunes.titulo')
      <section class="content">
        <div class="container-fluid">
          @yield('main_content')
        </div>
      </section>
    </div>
  </div>
  @include('layouts.frontAdmin.comunes.footer')
  @include('layouts.frontAdmin.comunes.scripts')
</body>
</html>
