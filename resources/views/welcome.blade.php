<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Ofel Kitchen</title>
    <meta name="description" content="Ofel Kitchen - Home">
    <meta name="keywords" content="Ofel Kitchen, Menu, Cake, bakery, enak, berkualitas">

    <!-- Favicons -->
    <link href="{{ URL::asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/aos/aos.js') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        /* Optional: Style adjustments */
        .modal-body .form-label {
            font-weight: 500;
        }

        #modalTotalPrice {
            font-weight: bold;
            font-size: 1.1em;
        }

        /* Style untuk kategori */
        .menu-card-category {
            font-size: 0.75em;
            color: #555;
            margin-bottom: 3px;
            display: block;
        }

        /* Style untuk filter (Dropdown) - LEFT ALIGN */
        .category-filter {
            margin-bottom: 10px;
            text-align: left;
        }

        .category-filter select {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 20px;
            border: 1px solid #ccc;
            background-color: white;
            color: #333;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position-x: 85%;
            background-position-y: 50%;
            padding-right: 15px;
            transition: border-color 0.2s ease;
            max-width: 170px;
        }

        .category-filter select:hover {
            border-color: #007bff;
        }

        .category-filter select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 2px rgba(0, 123, 255, 0.5);
        }

        /* Styles for the menu items and card - 4 COLUMNS */
        .menu-items {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .menu-item {
            width: 25%;
            padding-right: 15px;
            padding-left: 15px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .menu-card {
            width: 100%;
            font-size: 0.8rem;
        }

        .menu-card-img-container {
            max-height: 120px;
            overflow: hidden;
        }

        .menu-card-img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .menu-card-title {
            font-size: 0.9em;
            margin-bottom: 3px;
        }

        .ingredients {
            font-size: 0.75em;
            margin-bottom: 5px;
        }

        .price {
            font-size: 0.8em;
            margin-bottom: 7px;
        }

        .btn-danger {
            font-size: 0.7em;
            padding: 3px 6px;
        }

        /* Animasi Fade In/Out */
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        .fade-out {
            animation: fadeOut 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        /* Style adjustments for video container */
        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Style adjustments for menu item cards */
        .menu-item {
            margin-bottom: 20px;
        }

        .menu-card-img-container {
            height: 200px; /* Sesuaikan tinggi yang diinginkan */
            overflow: hidden;
        }

        .menu-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ini yang paling penting */
            display: block;
            transition: transform 0.3s ease;
        }

        .menu-card-img:hover {
            transform: scale(1.1); /* Efek zoom saat dihover */
        }

        /* Style for location map */
        .map-container {
            overflow: hidden;
            /* Prevent scrolling on the map itself */
        }

        /* Style adjustments for About Us image */
        .about-image-container {
            position: relative;
            /* Add positioning context */
        }

        .about-image {
            width: 105%;
            /* Reduce the width slightly */
            max-height: 450px;
            /* Reduce the max-height slightly */
            object-fit: cover;
            margin-left: 5%;
            /* Adjust margin to center it visually */
        }

        /* Styling untuk gambar di Hero Section */
        .hero-img-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            /* Optional: Add rounded corners */
            cursor: pointer;
            /* Change cursor to indicate clickable */
        }

        .hero-img-container img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
            /* Optional: Add zoom effect on hover */
        }

        .hero-img-container:hover img {
            transform: scale(1.1);
            /* Optional: Add zoom effect on hover */
        }

         /* Locations Section Style */
         .location-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            background-color: white;
        }

        .location-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }

        .location-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .location-card .map-container {
            margin-bottom: 15px;
        }

        .location-card .address,
        .location-card .phone {
            font-size: 0.9rem;
            color: #555;
        }

        .location-card .phone i {
            margin-right: 5px;
        }
    </style>
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/ofelkitchen.png') }}" alt="Ofel Kitchen Logo">
                <h1 class="sitename">Ofel Kitchen</h1>
            </a>

            @include('layouts.navbar')

            <div></div>
        </div>
    </header><!-- End Header -->

    <main class="main">

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero section light-background">
            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Celebrate Special Moment With Us</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Setiap kue punya cerita, setiap gigitan membawa
                            kebahagiaan. Rasakan kelezatan istimewa yang diciptakan dengan cerita, hanya di Ofel
                            Kitchen.</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                            <!-- Tombol Watch Video -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#videoModal">
                                Watch Video
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <!-- Ganti dengan struktur yang mirip dengan menu -->
                        <a href="{{ route('menu') }}">
                            <div class="hero-img-container">
                                <img src="{{ asset('assets/img/ofelkitchen.png') }}" class="img-fluid animated"
                                    alt="Ofel Kitchen Image">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section><!-- End Hero Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about section light-background">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h2>About Ofel Kitchen</h2>
                        @if ($about)
                        <p>{{ $about->description }}</p>
                        @else
                        <p>No About Us content available.</p>
                        @endif
                        <a href="{{ route('about') }}" class="btn-getstarted">Learn More</a>
                    </div>
                    <div class="col-lg-6 about-image-container">
                        @if ($about && $about->image_path)
                        <img src="{{ asset('storage/' . $about->image_path) }}" alt="About Us"
                            class="img-fluid rounded about-image">
                        @else
                        <img src="{{ asset('assets/img/stats-bg.jpg') }}" alt="Default About Us"
                            class="img-fluid rounded about-image">
                        @endif
                    </div>
                </div>
            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section">
            <div class="container">
                <h2 class="text-center">Our Menu</h2>
                <div class="container">
                    <div class="row gy-5 menu-items">
                        @foreach($menus->take(8) as $menu)
                        <!-- Limit to 8 items -->
                        <div class="col-lg-3 col-md-6 menu-item" data-aos="fade-up" data-aos-delay="100"
                            data-category="{{ $menu->category }}">
                            <div class="card h-100 shadow-sm menu-card">
                                <div class="menu-card-img-container">
                                    <a href="{{ asset('storage/' . $menu->image) }}" class="glightbox"
                                        data-gallery="menu-gallery-{{ $menu->id }}">
                                        <img src="{{ asset('storage/' . $menu->image) }}" class="menu-card-img"
                                            alt="{{ $menu->name }}">
                                    </a>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <span class="menu-card-category">{{ $menu->category }}</span>
                                    <h4 class="menu-card-title">{{ $menu->name }}</h4>
                                    <p class="ingredients">
                                        {{ $menu->description }}
                                    </p>
                                    <p class="price">
                                        Rp {{ number_format($menu->price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('menu') }}" class="btn btn-primary">See Full Menu</a>
                    </div>
                </div>
        </section><!-- End Menu Section -->

       <!-- ======= Locations Section ======= -->
        <section id="locations" class="locations section">
            <div class="container">
                <h2 class="text-center">Our Locations</h2>
                <div class="row">
                    @foreach($locations->take(2) as $location)
                    <div class="col-md-6 mb-4">
                        <!-- Tambahkan mb-4 untuk margin bawah -->
                        <div class="location-card">
                            <h3>{{ $location->name }}</h3>
                            <div class="map-container">
                                {!! $location->location !!}
                            </div>
                            <p class="address">{{ $location->address }}</p>
                            <!-- Tambahkan alamat -->
                            <p class="phone"><i class="bi bi-phone"></i> {{ $location->phone }}</p>
                            <!-- Tambahkan nomor telepon -->
                            @if($location->directions_url)
                            <a href="{{ $location->directions_url }}" target="_blank"
                                class="btn btn-sm btn-outline-info">
                                <i class="bi bi-geo-alt"></i> Get Directions
                            </a>
                            @endif
                            <!-- Tambahkan tautan arah -->
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('locations.indexPublic') }}" class="btn btn-secondary">View All Locations</a>
                </div>
            </div>
        </section><!-- End Locations Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section bg-light">
            <div class="container">
                <h2 class="text-center">What Our Customers Say</h2>
                <div class="row">
                    @foreach($feedbacks->take(3) as $feedback)
                    <div class="col-md-4 testimonial-item">
                        <p>{{ $feedback->message }}</p>
                        <p class="customer-name">{{ $feedback->name }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('feedback') }}" class="btn btn-info">Read More Reviews</a>
                </div>
            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
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
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Ofel Kitchen</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                    href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- ======= Video Modal ======= -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Watch Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="video-container">
                        <video width="100%" controls>
                            <source src="{{ asset('assets/Video/ofel.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Video Modal -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
