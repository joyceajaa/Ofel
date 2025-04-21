<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index | Ofel Kitchen</title>
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

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/ofelkitchen.png" alt="Ofel Kitchen Logo">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Ofel Kitchen</h1>
        <span>.</span>
      </a>

      @include('layouts.navbar')

      <a class="btn-getstarted" href="index.html#book-a-table">Book a Table</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h1>
            <p data-aos="fade-up" data-aos-delay="100">We are team of talented designers making websites with Bootstrap</p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/ofelkitchen.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->




    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row gy-5">
    
          <!-- Left: Info -->
          <div class="col-lg-5">
            <div class="info-item d-flex mb-4">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Address</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
    
            <div class="info-item d-flex mb-4">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h4>Call Us</h4>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
    
            <div class="info-item d-flex mb-4">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email Us</h4>
                <p>info@example.com</p>
              </div>
            </div>
    
            <div class="info-item d-flex">
              <i class="icon bi bi-clock flex-shrink-0"></i>
              <div>
                <h4>Opening Hours</h4>
                <p><strong>Mon-Sat:</strong> 11AM - 23PM<br><strong>Sunday:</strong> Closed</p>
              </div>
            </div>
          </div>
    
          <!-- Right: Contact Form -->
          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">
    
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
    
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
    
                <div class="col-md-12">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
    
                <div class="col-md-12">
                  <textarea name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                </div>
    
                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit">Send Message</button>
                </div>
    
              </div>
            </form>
          </div>
    
        </div>
    
        <!-- Google Maps -->
        <div class="mt-5">
          <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>
    
      </div>
    </section>

  </main>

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
      const contactSection = document.getElementById('contact');
      if (contactSection) {
        window.scrollTo(0, contactSection.offsetTop);
      }
    };
  </script>

</body>

</html>
