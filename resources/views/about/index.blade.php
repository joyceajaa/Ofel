{{-- resources/views/about/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About Us - Ofel Kitchen</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
      /* styling kecil agar gambar About proporsional */
      .about-image {
          width: 100%;
          max-width: 420px;
          max-height: 450px;
          object-fit: cover;
          display: block;
          margin: 0 auto;
      }
      .section-title h2 { margin-bottom: 0.5rem; }
      @media (min-width: 992px) {
        .about-image { margin-left: 2.5%; }
      }
  </style>
</head>

<body>

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="{{ asset('assets/img/ofelkitchen.png') }}" alt="Ofel Kitchen Logo" style="height:48px;">
        <h1 class="sitename ms-2">Ofel Kitchen</h1>
      </a>

      @include('layouts.navbar')

    </div>
  </header>

  <main class="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about section py-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About Us</h2>
          <p>Learn More <span>About Ofel Kitchen</span></p>
        </div>

        @if ($about)
        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">
            <h3>{{ $about->title }}</h3>
            <p class="fst-italic">
              {!! $about->description !!}
            </p>
          </div>

          <div class="col-lg-6 text-center">
            @php
              $storagePath = $about->image_path ? public_path('storage/' . $about->image_path) : null;
            @endphp

            @if ($about->image_path && $storagePath && file_exists($storagePath))
              <a href="{{ asset('storage/' . $about->image_path) }}" class="glightbox" data-gallery="about-gallery">
                <img src="{{ asset('storage/' . $about->image_path) }}" class="img-fluid rounded about-image" alt="About Ofel Kitchen">
              </a>
            @elseif(file_exists(public_path('assets/img/ofelkitchen.png')))
              <img src="{{ asset('assets/img/ofelkitchen.png') }}" class="img-fluid rounded about-image" alt="Ofel Kitchen">
            @else
              <p>No image available</p>
            @endif
          </div>

        </div>
        @else
        <p>No About Us content available.</p>
        @endif

      </div>
    </section><!-- End About Us Section -->

  </main>

  <footer id="footer" class="footer dark-background">
    @include('layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
