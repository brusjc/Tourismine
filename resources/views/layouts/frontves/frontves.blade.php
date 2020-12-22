<!DOCTYPE html>
<html lang="en">

<head>
</head>
  @include('layouts.frontves.comunes.head')
<body>

  <header id="header" class="fixed-top d-flex align-items-center">
   @include('layouts.frontves.comunes.nav')
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">@yield('contentheader_h1')</h1>
          <div class="mt-4" data-aos="fade-up" data-aos-delay="800">
            @include('layouts.frontves.comunes.breadcrumb')
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    @yield('main_content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('layouts.frontves.comunes.footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('layouts.frontves.comunes.scripts')

</body>

</html>