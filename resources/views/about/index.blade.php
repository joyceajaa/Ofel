<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Yummy Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{URL:: asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{URL:: asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL:: asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{URL:: asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/ofelkitchen.png" alt="Ofel Kitchen Logo">
        <h1 class="sitename">Ofel Kitchen</h1>
        <span>.</span>
      </a>

      @include('layouts.navbar')

      <a class="btn-getstarted" href="index.html#book-a-table">Book a Table</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <!-- ======= About Us Section ======= -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>About Us</h2>
      <p>Learn More <span>About Ofel Kitchen</span></p>
    </div>

    <div class="row gy-4 align-items-center">

      <div class="col-lg-6 content">
        <h3>We bring homemade taste with premium quality ingredients</h3>
        <p class="fst-italic">
          Ofel Kitchen is more than just a restaurant—it's a culinary experience inspired by the warmth of home-cooked meals and the richness of local flavors.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> Fresh ingredients sourced locally and prepared daily.</li>
          <li><i class="bi bi-check-circle"></i> Friendly and cozy atmosphere, perfect for families and friends.</li>
          <li><i class="bi bi-check-circle"></i> A wide variety of dishes for all tastes and preferences.</li>
        </ul>
        <p>
          Since opening our doors, we have aimed to serve food that makes people feel at home. Our chefs are passionate, our staff is welcoming, and our menu is made to impress.
        </p>
      </div>

      <div class="col-lg-6">
        <img src="assets/img/about.jpg" class="img-fluid rounded" alt="About Ofel Kitchen">
      </div>

    </div>

    <div class="row gy-4 mt-5">

      <div class="col-lg-6">
        <div class="icon-box d-flex">
          <i class="bi bi-bullseye flex-shrink-0"></i>
          <div>
            <h4>Our Vision</h4>
            <p>To be the leading home-style restaurant that people think of first when they crave comfort and flavor.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="icon-box d-flex">
          <i class="bi bi-award flex-shrink-0"></i>
          <div>
            <h4>Our Mission</h4>
            <p>Deliver exceptional dining experiences through heartfelt service, consistent quality, and a touch of home in every dish.</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- End About Us Section -->



  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{URL:: asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    window.onload = function() {
      const aboutSection = document.getElementById('about');
      if (aboutSection) {
        window.scrollTo(0, aboutSection.offsetTop);
      }
    };
  </script>

</body>

</html>
