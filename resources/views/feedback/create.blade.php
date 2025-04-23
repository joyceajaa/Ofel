<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback - Ofel Kitchen</title>
  <link href="{{URL:: asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{URL:: asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL:: asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL:: asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{URL:: asset('assets/css/main.css')}}" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f7fb;
      color: #333;
    }

    /* Header Styling */
    header {
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px 0;
    }

    .logo img {
      width: 150px;
    }

    .navbar a {
      color: #555;
      font-size: 16px;
      margin: 0 20px;
    }

    .btn-getstarted {
      background-color: #6c63ff;
      color: white;
      padding: 12px 30px;
      border-radius: 30px;
      border: none;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Feedback Section */
    .feedback-section {
      padding: 80px 0;
      background-color: #ffffff;
    }

    .feedback-card {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-top: 30px;
    }

    .feedback-card h2 {
      font-size: 32px;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
    }

    .feedback-card p {
      color: #666;
      margin-bottom: 40px;
      font-size: 18px;
    }

    .form-control {
      border-radius: 10px;
      border: 2px solid #e2e2e2;
      padding: 15px;
      font-size: 16px;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color:rgb(207, 19, 28);
      box-shadow: 0 0 8px rgb(207, 19, 28);
    }

    .btn-submit {
      background-color: rgb(207, 19, 28);
      color: white;
      padding: 12px 30px;
      border-radius: 30px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
      background-color: rgb(207, 19, 28);
      transform: translateY(-2px);
    }

    /* Footer Styling */
    footer {
      background-color: #222;
      color: #fff;
      padding: 60px 0;
    }

    footer .social-links a {
      margin: 0 10px;
      color: #fff;
      font-size: 20px;
    }

    footer .social-links a:hover {
      color:rgb(207, 19, 28);
    }

    /* Scroll To Top */
    #scroll-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: rgb(207, 19, 28);
      color: white;
      padding: 12px;
      border-radius: 50%;
      font-size: 18px;
      display: none;
      transition: background-color 0.3s;
    }

    #scroll-top:hover {
      background-color: rgb(207, 19, 28);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar a {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0" style="gap: 10px;">
        <img src="assets/img/ofelkitchen.png" alt="Ofel Kitchen Logo" style="max-width: 120px; height: auto; object-fit: contain;">
        <h1 class="sitename" style="margin-bottom: 0;">Ofel Kitchen</h1>
        <span>.</span>
      </a>
      @include('layouts.navbar')

      <a class="btn-getstarted" href="index.html#book-a-table">Book a Table</a>
    </div>
  </header>

  <main class="main">
    <!-- Feedback Section -->
    <section id="feedback" class="feedback-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="feedback-card" data-aos="fade-up">
              <h2>We'd Love Your Feedback</h2>
              <p>Help us improve by sharing your thoughts on your experience!</p>

              <form action="{{ route('feedback.store')}}" method="POST">
                @method('POST')
                @csrf
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                  </div>
                  <div class="col-12">
                    <textarea name="message" class="form-control" rows="5" placeholder="Your Feedback" required></textarea>
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" class="btn-submit">Submit Feedback</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Feedback Section -->
  </main>

  <footer id="footer">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span>
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
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL:: asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL:: asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{URL:: asset('assets/js/main.js')}}"></script>
</body>

</html>
