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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

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
            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{URL:: asset('assets/img/ofelkitchen.png')}}" alt="Ofel Kitchen Logo">
                <h1 class="sitename">Ofel Kitchen</h1>
                <span>.</span>
            </a>
            @include('layouts.navbar')
            <a><a></a>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1> <data-aos="fade-up">Celebrate Special Moment With Us<br>
                        </h1>

                        <p>Setiap kue punya cerita, setiap gigitan membawa kebahagiaan, Rasakan kelezatan istimewa yang diciptakan
                            dengan cerita, hanya di Ofel Kitchen</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
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

                <div class="row gy-5 justify-content-center">

                    <div class="row"> <!-- Tambahkan kontainer row untuk membagi menjadi kolom -->
                        <div class="col-lg-6">
                            <!-- Kolom kiri -->
                            <div class="info-item d-flex mb-4">
                                <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Address</h4>
                                    @if($contact)
                                        <p>{{ $contact->alamat ?? 'Tidak ada alamat' }}</p>
                                    @else
                                        <p>Tidak ada data kontak</p>
                                    @endif
                                </div>
                            </div>

                            <div class="info-item d-flex mb-4">
                                <i class="icon bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h4>Call Us</h4>
                                    @if($contact)
                                        <p>{{ $contact->nomor_telepon ?? 'Tidak ada nomor telepon' }}</p>
                                    @else
                                        <p>Tidak ada data kontak</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Kolom kanan -->
                            <div class="info-item d-flex mb-4">
                                <i class="icon bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email Us</h4>
                                    @if($contact)
                                        <p>{{ $contact->email ?? 'Tidak ada email' }}</p>
                                    @else
                                        <p>Tidak ada data kontak</p>
                                    @endif
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <i class="icon bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h4>Opening Hours</h4>
                                     @if($contact)
                                        <p>{{ $contact->jadwal_toko ?? 'Tidak ada jadwal toko' }}</p>
                                    @else
                                        <p>Tidak ada data kontak</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </section>

    </main>

    @include('layouts.footer')

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

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
            window.onload = function () {
                const contactSection = document.getElementById('contact');
                if (contactSection) {
                    window.scrollTo(0, contactSection.offsetTop);
                }
            };
        </script>

</body>

</html>
