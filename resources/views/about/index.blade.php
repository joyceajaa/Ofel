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
        <h3>Kami Menghadirkan Cita Rasa Rumahan Dengan Bahan-Bahan Premium</h3>
        <p class="fst-italic">
            Ofel berdiri November 2020. Menjual cake online melalui media sosial. Usaha ini home made dan berlokasi di onan raja balige 3. Sampai hari ini ofel masih terus belajar memberikannya pelayanan terbaik kepada customer. Total produk yg sudah terjual sudah lebih dari 10k++. Pelanggan ofel berasal dari banyak daerah di Indonesia bahkan dari luar negeri Costumer dari jauh pesan cake untuk diantarkan kepada keluarga di kampung (balige)
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i>Bahan-bahan segar lokal yang diolah setiap hari dengan standar tinggi.</li>
          <li><i class="bi bi-check-circle"></i>Menu beragam yang dirancang untuk memuaskan selera setiap pelanggan.</li>

        </ul>
        <p>
            Sejak pertama kali kami membuka pintu, misi kami jelas yaitu menyajikan makanan yang tidak hanya mengenyangkan, tetapi juga menghadirkan rasa "pulang" di setiap suapan. Tim dapur kami yang penuh semangat dan staf yang ramah siap memberikan pengalaman bersantap terbaik untuk Anda.
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
            <h4>How To Order?</h4>
            <ul>
                <li>Chat admin sesuai dengan kebutuhan, dan menginformasikan rencana tanggal yang diinginkan</li>
                <li>Apabila tanggal yang diinginkan tersedia, proses diskusi design akan dilanjutkan dan detail harga akan disampaikan oleh admin</li>
                <li>Setelah customer setuju dengan penawaran yang diberikan, form order akan di share oleh admin</li>
                <li>Setelah form order diisi, admin akan merekap dan mentotalkannya</li>
                <li>Pesanan akan diproses apabila customer sudah melakukan pembayaran melalui bank transfer</li>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="icon-box d-flex">
          <i class="bi bi-award flex-shrink-0"></i>
          <div>
            <h4>Our Vision</h4>
            <p>Menyajikan pengalaman bersantap yang istimewa melalui pelayanan sepenuh hati, kualitas yang konsisten, dan sentuhan kehangatan rumah di setiap hidangan.</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- End About Us Section -->



  <footer id="footer" class="footer dark-background">

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
