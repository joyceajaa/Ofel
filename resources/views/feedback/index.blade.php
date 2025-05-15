<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Ofel Kitchen</title>
    <link href="{{ URL::asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">

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
            padding: 40px 0;
            background-color: #ffffff;
        }

        .feedback-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .feedback-card h2 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .feedback-card p {
            color: #666;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e2e2e2;
            padding: 12px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: rgb(207, 19, 28);
            box-shadow: 0 0 8px rgb(207, 19, 28);
        }

        .btn-submit {
            background-color: rgb(207, 19, 28);
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            font-size: 14px;
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
            padding: 40px 0;
        }

        footer .social-links a {
            margin: 0 8px;
            color: #fff;
            font-size: 18px;
        }

        footer .social-links a:hover {
            color: rgb(207, 19, 28);
        }

        /* Scroll To Top */
        #scroll-top {
            position: fixed;
            bottom: 15px;
            right: 15px;
            background-color: rgb(207, 19, 28);
            color: white;
            padding: 10px;
            border-radius: 50%;
            font-size: 16px;
            display: none;
            transition: background-color 0.3s;
        }

        #scroll-top:hover {
            background-color: rgb(207, 19, 28);
        }

        /* Feedback List Styling */
        .feedback-list {
            margin-top: 20px;
        }

        .feedback-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .feedback-item:last-child {
            border-bottom: none;
        }

        .feedback-name {
            font-weight: 600;
            color: #333;
            font-size: 16px;
        }

        .feedback-email {
            color: #777;
            font-size: 12px;
        }

        .feedback-message {
            margin-top: 8px;
            color: #555;
            font-size: 14px;
        }

        /* Media Styling */
        .media-container {
            display: flex;
            /* Enables flexbox layout */
            align-items: center; /* Vertically align items */
            gap: 10px;
            /* Adds spacing between items */
            margin-top: 8px;
            /* Adds margin above the container */
        }

        .media-item {
            width: 30%; /* Fixed width for each item */
            box-sizing: border-box;
            /* Includes padding and border in the element's total width and height */
            text-align: center;
            /* Centers content within each media item */
        }

        .media-item img,
        .media-item video {
            max-width: 30%;
            /* Ensures the media doesn't exceed its container */
            height: auto;
            /* Maintains aspect ratio */
            border-radius: 10px;
            /* Rounds the corners of the media */
            display: block; /* Remove extra space below image */
            margin: 0 auto; /* Center the image/video */
        }
        .customer-feedback-container {
            margin-bottom: 20px; /* Adjust the margin as needed */
        }
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0" style="gap: 5px;">
                <img src="{{ asset('assets/img/ofelkitchen.png') }}" alt="Ofel Kitchen Logo"
                    style="max-width: 120px; height: auto; object-fit: contain;">
                <h1 class="sitename" style="margin-bottom: 0; margin-left: 5px;">Ofel Kitchen</h1>
                <span>.</span>
            </a>
            @include('layouts.navbar')
            <a><a><a></a>
        </div>
    </header>

    <main class="main">
        <!-- Feedback Section -->
        <section id="feedback" class="feedback-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="feedback-card" data-aos="fade-up">
                            <h2>Customer Feedback</h2>
                            <p>What our customers are saying about us!</p>

                            <div class="feedback-list">
                                @if ($feedbacks->isEmpty())
                                    <p>No feedback yet.</p>
                                @else
                                    @foreach ($feedbacks as $feedback)
                                        <div class="feedback-item customer-feedback-container">
                                            <h3 class="feedback-name">{{ $feedback->name }}</h3>
                                            <p class="feedback-email">{{ $feedback->email }}</p>
                                            <p class="feedback-message">{{ $feedback->message }}</p>

                                            <div class="media-container">
                                                @if ($feedback->image)
                                                    <div class="media-item">
                                                        <img src="{{ asset('storage/' . $feedback->image) }}"
                                                            alt="Foto">
                                                    </div>
                                                @endif

                                                @if ($feedback->video)
                                                    <div class="media-item">
                                                        <video controls>
                                                            <source src="{{ asset('storage/' . $feedback->video) }}"
                                                                type="video/mp4">
                                                            Browser tidak mendukung pemutaran video.
                                                        </video>
                                                    </div>
                                                @endif
                                            </div>

                                            <small class="text-muted">Received on:
                                                {{ $feedback->created_at->format('Y-m-d H:i') }}</small>
                                        </div>
                                    @endforeach
                                    <!-- Pagination Links -->
                                    <div class="mt-4">
                                        {{ $feedbacks->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Feedback Section -->
        <br><br><br><br><br><br><br><br><br><br>
    </main>

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
                <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights
                        Reserved</span></p>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                        href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>

        </footer>



        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
</body>

</html>
