<!DOCTYPE html>
<head>
  @include('comunes.headHtml')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include('comunes.bodyCabeza')
    @include('comunes.bodySidebar')
    <div class="content-wrapper">
      @include('comunes.bodyTitulo')
      <section class="content">
        <div class="container-fluid">
          @yield('main_content')
        </div>
      </section>
    </div>
  </div>
  @include('comunes.footer')
  @include('comunes.scripts')
</body>
</html>
