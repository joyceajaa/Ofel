<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Wilayah Pengantaran - Ofel Kitchen</title>
    <meta name="description" content="Daftar wilayah pengantaran Ofel Kitchen.">
    <meta name="keywords" content="wilayah, pengantaran, area, delivery area">

    <!-- Favicons -->
    <link href="{{ URL::asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        .location-section ul {
            list-style-type: disc;
            padding-left: 20px;
        }
    </style>

</head>

<body>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ URL::asset('assets/img/ofelkitchen.png') }}" alt="Ofel Kitchen Logo">
                <h1 class="sitename">Ofel Kitchen</h1>
                <span>.</span>
            </a>
            @include('layouts.navbar')
            <a><a>
        </div>
    </header>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Wilayah Pengantaran</h2>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Location Section ======= -->
        <section id="location" class="location-section py-5">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Berikut adalah daftar wilayah yang terjangkau untuk pengantaran oleh Ofel Kitchen:</p>
                        @if(isset($wilayahs) && count($wilayahs) > 0)
                        <ul>
                            @foreach($wilayahs as $wilayah)
                            <li>{{ $wilayah->nama }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>Saat ini belum ada wilayah yang terjangkau.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- End Location Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>

</body>

</html>
