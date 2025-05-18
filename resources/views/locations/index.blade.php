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
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/aos/aos.js') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    .map-container {
      position: relative;
      padding-bottom: 40%; /* Tinggi dikurangi */
      height: 0;
      overflow: hidden;
      max-width: 600px; /* Lebar tetap sama */
    }

    .map-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100% !important;
      height: 100% !important;
    }

    /* Style agar map dan dropdown berdampingan */
    .location-item {
      display: flex;
      flex-direction: row; /* Mengatur item dalam baris */
      align-items: flex-start; /* Agar item berada di atas */
      gap: 20px; /* Jarak antara map dan dropdown */
    }

    .map-container {
      flex: 6; /* Map mengambil 6/10 lebar */
    }

    .district-select-container {
      flex: 4; /* Dropdown mengambil 4/10 lebar */
      width: auto; /* Biarkan lebar otomatis */
      min-width: 200px; /* Lebar minimum dropdown */
    }

    /* Lebar kolom diperbesar */
    .col-lg-6 {
      width: 100%; /* Mengisi seluruh lebar */
    }

    @media (min-width: 992px) { /* breakpoint untuk large screens */
        .col-lg-6 {
            width: 100%; /* Mengisi seluruh lebar */
        }
        .location-item { /*mengatur tampilan map dan dropdown berdampingan */
        display: flex;
        }
    }

    /* CSS untuk daftar kecamatan Balige (opsional) */
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
                <img src="{{URL:: asset('assets/img/ofelkitchen.png')}}" alt="Ofel Kitchen Logo">
                <h1 class="sitename">Ofel Kitchen</h1>
                <span>.</span>
            </a>
            @include('layouts.navbar')
            <a><a></a>
        </div>
    </header>

  <!-- Main Content -->

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
              <div class="location-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="map-container">
                  <h3>{{ $location->name }}</h3>
                  {!! $location->location !!}  <!-- Menampilkan embed code -->
                </div>

                {{-- Dropdown Kecamatan --}}
                <div class="district-select-container">
                    <label for="orderDistrict" class="form-label">Pilih Kecamatan (yang terjangkau) <span class="text-danger">*</span></label>
                    <select class="form-select" id="orderDistrict-{{ $location->id }}" required>
                        <option value="" selected disabled>-- Pilih Kecamatan --</option>
                         {{-- Opsi akan diisi oleh JavaScript --}}
                    </select>
                     <small class="text-muted">Pilih hanya jika Anda berada di salah satu kecamatan ini.</small>
                </div>
              </div>
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
<br>
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
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

  <script>
    // --- DATA KECAMATAN (DIMODIFIKASI DENGAN STATUS DELIVERABLE) ---
    const cityDistricts = {
        "Balige": [
            { name: "Balige I", deliverable: true },
            { name: "Balige II", deliverable: true },
            { name: "Balige III", deliverable: true },
            { name: "Aek Bolon Jae", deliverable: true },
            { name: "Aek Bolon Julu", deliverable: true },
            { name: "Baru Ara", deliverable: true },
            { name: "Bonan Dolok I", deliverable: true },
            { name: "Bonan Dolok III", deliverable: true },
            { name: "Hinalang Bagasan", deliverable: true },
            { name: "Huta Bulu Mejan", deliverable: true },
            { name: "Huta Dame", deliverable: true },
            { name: "Huta Namora", deliverable: true },
            { name: "Lumban Bulbul", deliverable: true },
            { name: "Lumban Gaol", deliverable: true },
            { name: "Lumban Gorat", deliverable: true },
            { name: "Lumban Pea", deliverable: true },
            { name: "Lumban Silintong", deliverable: true },
            { name: "Paindoan", deliverable: true },
            { name: "Parsuratan", deliverable: true },
            { name: "Sianipar Sihailhail", deliverable: true },
            { name: "Sibolahotang Sas", deliverable: true },
            { name: "Siboruon", deliverable: true },
            { name: "Silalahi Pagar Batu", deliverable: true }
        ]
    };
    // --- END DATA KECAMATAN ---

    document.addEventListener('DOMContentLoaded', function() {
      @foreach ($locations as $location)
      const orderDistrictSelect{{ $location->id }} = document.getElementById('orderDistrict-{{ $location->id }}');

      function populateDistricts{{ $location->id }}() {
          const districts = cityDistricts["Balige"]; // Karena hanya Balige
          orderDistrictSelect{{ $location->id }}.innerHTML = '<option value="" selected disabled>-- Pilih Kecamatan --</option>';

          if (districts) {
              districts.forEach(district => {
                  const option = new Option(district.name, district.name);
                  orderDistrictSelect{{ $location->id }}.add(option);
              });
          }
      }

      populateDistricts{{ $location->id }}(); // Panggil saat halaman diload
      @endforeach
    });

  </script>

</body>

</html>
