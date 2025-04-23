<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Location - Ofel Kitchen</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{URL:: asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{URL:: asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL:: asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{URL:: asset('assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="location-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/ofelkitchen.png" alt="Ofel Kitchen Logo">
        <h1 class="sitename">Ofel Kitchen</h1>
        <span>.</span>
      </a>

      @include('layouts.navbar')


    </div>
  </header>

  <!-- Main Content -->
  <main class="main">

    <!-- Location Section -->
    <section id="location" class="location-section py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="section-title" data-aos="fade-up">Visit Us</h2>
            <p class="location-description" data-aos="fade-up" data-aos-delay="100">
                Kunjungi kami dan nikmati hidangan lezat di Toko kami.Kami berlokasi dekat dengan kota.
              <br><br>
              <strong>Address:</strong> Uma Rihit Onan Raja, Balige III
            </p>
          </div>
          <div class="col-lg-6">
            <div class="map-container" data-aos="fade-up" data-aos-delay="200">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.5264716747793!2d99.06732156872751!3d2.3276134900835634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e050072152d5b%3A0xb13fcc477b6417f!2sOFEL%20KITCHEN!5e0!3m2!1sid!2sid!4v1744684492983!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Location Section -->

  </main>

  <!-- Footer -->
  <footer id="footer" class="footer dark-background py-5">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>Uma Rihit</p>
            <p>Onan Raja, Balige III</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+62 819 1259 1669</span><br>
              <strong>Instagram:</strong> <span>@ofelkitchen.id</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>08AM - 11PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer><!-- End Footer -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL:: asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
