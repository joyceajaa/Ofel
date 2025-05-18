<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Our Locations - Ofel Kitchen</title>
    <meta name="description" content="Find the nearest Ofel Kitchen location.">
    <meta name="keywords" content="restaurant, location, address, map">

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
        /* Style agar map dan pemberitahuan berdampingan */
        .location-item {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 20px;
        }

        .map-container {
            flex: 6;
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
        }

        .district-notification-container {
            flex: 4;
            width: auto;
            min-width: 200px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .location-item {
                flex-direction: column;
            }

            .map-container {
                padding-bottom: 75%; /* Adjust aspect ratio if needed */
            }

            .district-notification-container {
                width: 100%;
            }
        }

        .location-section h4 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

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
            <a></a>
        </div>
    </header>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Locations</h2>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Location Section ======= -->
        <section id="location" class="location-section py-5">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    @forelse ($locations as $location)
                    <div class="col-lg-6 mb-4">
                        <article class="location-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="map-container">
                                <h3>{{ $location->name }}</h3>
                                {!! $location->location !!}
                                <!-- Pastikan embed code ini benar dan responsif -->
                            </div>

                            <div class="district-notification-container">
                                <p>Kami melayani pengantaran ke kecamatan berikut:</p>
                                <ul id="deliverableDistricts-{{ $location->id }}">
                                    <!-- Daftar kecamatan akan diisi oleh JavaScript -->
                                </ul>
                                <small class="text-muted">Kami hanya melayani pengiriman ke kecamatan yang
                                    terdaftar.</small>
                            </div>
                        </article>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>No locations currently listed. Please check back later!</p>
                    </div>
                    @endforelse
                </div>

                <!-- Daftar Kecamatan Balige -->
                @if(isset($balige_kecamatan['Balige']) && count($balige_kecamatan['Balige']) > 0)
                <div class="row">
                    <div class="col-12">
                        <h4>Kecamatan di Balige yang Terjangkau</h4>
                        <ul>
                            @foreach($balige_kecamatan['Balige'] as $kecamatan)
                            <li>{{ $kecamatan['name'] }}
                                @if($kecamatan['deliverable'])
                                (Bisa diantar)
                                @else
                                (Tidak bisa diantar)
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12">
                        <p>Belum ada daftar kecamatan Balige.</p>
                    </div>
                </div>
                @endif
                <!-- End Daftar Kecamatan Balige -->

            </div>
        </section>
        <!-- End Location Section -->

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

    <script>
        // --- DATA KECAMATAN (DIMODIFIKASI DENGAN STATUS DELIVERABLE) ---
        const cityDistricts = {
            "Balige": [{
                    name: "Balige I",
                    deliverable: true
                },
                {
                    name: "Balige II",
                    deliverable: true
                },
                {
                    name: "Balige III",
                    deliverable: true
                },
                {
                    name: "Aek Bolon Jae",
                    deliverable: true
                },
                {
                    name: "Aek Bolon Julu",
                    deliverable: true
                },
                {
                    name: "Baru Ara",
                    deliverable: true
                },
                {
                    name: "Bonan Dolok I",
                    deliverable: true
                },
                {
                    name: "Bonan Dolok III",
                    deliverable: true
                },
                {
                    name: "Hinalang Bagasan",
                    deliverable: true
                },
                {
                    name: "Huta Bulu Mejan",
                    deliverable: true
                },
                {
                    name: "Huta Dame",
                    deliverable: true
                },
                {
                    name: "Huta Namora",
                    deliverable: true
                },
                {
                    name: "Lumban Bulbul",
                    deliverable: true
                },
                {
                    name: "Lumban Gaol",
                    deliverable: true
                },
                {
                    name: "Lumban Gorat",
                    deliverable: true
                },
                {
                    name: "Lumban Pea",
                    deliverable: true
                },
                {
                    name: "Lumban Silintong",
                    deliverable: true
                },
                {
                    name: "Paindoan",
                    deliverable: true
                },
                {
                    name: "Parsuratan",
                    deliverable: true
                },
                {
                    name: "Sianipar Sihailhail",
                    deliverable: true
                },
                {
                    name: "Sibolahotang Sas",
                    deliverable: true
                },
                {
                    name: "Siboruon",
                    deliverable: true
                },
                {
                    name: "Silalahi Pagar Batu",
                    deliverable: true
                }
            ]
        };
        // --- END DATA KECAMATAN ---

        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($locations as $location)
            const deliverableDistrictsList{{ $location->id }} = document.getElementById('deliverableDistricts-{{
                $location->id }}');

            function populateDeliverableDistricts{{ $location->id }}() {
                const districts = cityDistricts["Balige"]; // Karena hanya Balige
                deliverableDistrictsList{{ $location->id }}.innerHTML = ''; // Kosongkan dulu

                if (districts) {
                    districts.forEach(district => {
                        if (district.deliverable) {
                            const listItem = document.createElement('li');
                            listItem.textContent = district.name;
                            deliverableDistrictsList{{ $location->id }}.appendChild(listItem);
                        }
                    });
                }
            }

            populateDeliverableDistricts{{ $location->id }}(); // Panggil saat halaman diload
            @endforeach
        });
    </script>

</body>

</html>
