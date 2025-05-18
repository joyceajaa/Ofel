<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Menu - Ofel Kitchen</title>
    <meta name="description" content="Menu Ofel Kitchen">
    <meta name="keywords" content="Ofel Kitchen, Menu, Cake">

    <!-- Favicons -->
    <link href="{{ URL::asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
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
            margin-bottom: 15px;
            text-align: left;
        }

        .category-filter select {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 25px;
            border: none;
            background-color: #f8f9fa;
            color: #495057;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%236c757d' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: 50%;
            padding-right: 30px;
            transition: all 0.3s ease;
            max-width: 220px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .category-filter select:hover {
            background-color: #e9ecef;
            color: #007bff;
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.2);
        }

        .category-filter select:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Styles for the menu items and card - 4 COLUMNS */
        .menu-items {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .menu-item {
            padding-right: 15px;
            padding-left: 15px;
            margin-bottom: 10px;
            box-sizing: border-box;
            opacity: 1;  /* Set opacity to 1 by default */
            transition: opacity 0.3s ease-in-out, display 0.3s ease-in-out; /* Add transition for opacity and display */
        }

        .menu-card {
            width: 100%;
            font-size: 0.8rem;
        }

        .menu-card-img-container {
            max-height: 200px;
            overflow: hidden;
        }

        .menu-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-card-img:hover {
            transform: scale(1.1);
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
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }

        /* Media Queries untuk Responsivitas Lebih Lanjut */
        @media (max-width: 768px) {
            .menu-card-img-container {
                max-height: 150px;
            }

            .category-filter select {
                font-size: 0.9rem;
                padding: 8px 16px;
            }
        }

        @media (max-width: 576px) {
            .menu-card-img-container {
                max-height: 120px;
            }

            .category-filter select {
                font-size: 0.8rem;
                padding: 6px 12px;
            }
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ URL::asset('assets/img/ofelkitchen.png') }}" alt="Ofel Kitchen Logo">
                <h1 class="sitename">Ofel Kitchen</h1>
            </a>
            @include('layouts.navbar')
            <a></a>
        </div>
    </header>

    <main class="main">

        <section id="menu" class="menu section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Menu</h2>
                <p><span>Check Our</span> <span class="description-title">Ofel Kitchen Menu</span></p>
            </div>

            <!-- Filter Kategori (Dropdown) -->
            <div class="container category-filter" data-aos="fade-up">
                <select id="categoryFilterDropdown" class="form-select">
                    <option value="all" selected>Semua Kategori</option>
                    <option value="BentoCake">Bento Cake</option>
                    <option value="Bouquet">Bouquet</option>
                    <option value="CharacterCake">Character Cake</option>
                    <option value="FlowerBouquet">Flower Bouquet</option>
                    <option value="FruitCake">Fruit Cake</option>
                    <option value="FudyBrownies">Fudy Brownies</option>
                    <option value="KleponCake">Klepon Cake</option>
                    <option value="PaintingCake">Painting Cake</option>
                    <option value="Pudding">Pudding</option>
                    <option value="RibbonCake">Ribbon Cake</option>
                    <option value="TierCake">Tier Cake</option>
                </select>
            </div>

            <div class="container">
                <div class="row menu-items gy-5">
                    @foreach($menus as $menu)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 menu-item" data-aos="fade-up" data-aos-delay="100"
                        data-category="{{ $menu->category }}">
                        <div class="card h-100 shadow-sm menu-card">
                            <div class="menu-card-img-container">
                                <a href="{{ asset('storage/' . $menu->image) }}" class="glightbox"
                                    data-gallery="menu-gallery-{{ $menu->id }}">
                                    <img src="{{ asset('storage/' . $menu->image) }}" class="menu-card-img img-fluid"
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
                                <button type="button" class="btn btn-danger mt-auto align-self-start"
                                    data-bs-toggle="modal" data-bs-target="#orderModal"
                                    data-menu-id="{{ $menu->id }}" data-menu-name="{{ $menu->name }}"
                                    data-menu-price="{{ $menu->price }}"
                                    data-menu-image="{{ asset('storage/' . $menu->image) }}"
                                    data-menu-link="{{ route('menu.show', $menu->id) }}">
                                    Pesan
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    <!-- Modal Pemesanan -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Form Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="modalItemImage" src="" alt="Menu Item" class="img-fluid rounded"
                            style="max-height: 150px;">
                    </div>
                    <h5 class="text-center mb-3" id="modalItemName">Nama Menu</h5>
                    <p class="text-center">Harga Satuan: <span id="modalItemPrice">Rp 0</span></p>

                    <form id="orderForm">
                        <input type="hidden" id="modalBasePrice" value="0">
                        <input type="hidden" id="modalMenuNameHidden" value="">
                        <input type="hidden" id="modalMenuLinkHidden" value="">

                        {{-- Pilihan Kota --}}
                        <div class="mb-3">
                            <label for="orderCity" class="form-label">Pilih Kota <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="orderCity" required>
                                <option value="" selected disabled>-- Pilih Kota --</option>
                                <option value="Balige">Balige</option>
                            </select>
                        </div>

                        {{-- Pilihan Kecamatan (Dinamis) --}}
                        <div class="mb-3">
                            <label for="orderDistrict" class="form-label">Pilih Kecamatan <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="orderDistrict" required disabled>
                                <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                {{-- Opsi akan diisi oleh JavaScript --}}
                            </select>
                        </div>

                        {{-- Alamat Lengkap --}}
                        <div class="mb-3">
                            <label for="orderAddress" class="form-label">Alamat Lengkap <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="orderAddress" rows="3"
                                placeholder="Masukkan nama jalan, nomor rumah, kelurahan, patokan, dll."
                                required></textarea>
                        </div>

                        {{-- Ucapan --}}
                        <div class="mb-3">
                            <label for="orderGreeting" class="form-label">Ucapan Tambahan</label>
                            <textarea class="form-control" id="orderGreeting" rows="2"
                                placeholder="Contoh: Selamat Ulang Tahun!"></textarea>
                        </div>

                        {{-- Jumlah --}}
                        <div class="mb-3">
                            <label for="orderQuantity" class="form-label">Jumlah Pesanan <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="orderQuantity" value="1" min="1" required>
                        </div>

                        <div class="mt-3 text-center">
                            <h5>Total Harga: <span id="modalTotalPrice">Rp 0</span></h5>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" id="sendWhatsAppOrder"><i
                            class="bi bi-whatsapp"></i> Pesan via WhatsApp</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Pemesanan -->


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
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>

        <script>
            // --- DATA KECAMATAN (DIMODIFIKASI DENGAN STATUS DELIVERABLE) ---
            // PENTING: Sesuaikan status 'deliverable: true/false' sesuai area layanan Anda!
            const cityDistricts = {
                "Medan": [{
                        name: "Medan Amplas",
                        deliverable: true
                    },
                    {
                        name: "Medan Area",
                        deliverable: true
                    },
                    {
                        name: "Medan Barat",
                        deliverable: true
                    },
                    {
                        name: "Medan Baru",
                        deliverable: true
                    },
                    {
                        name: "Medan Belawan",
                        deliverable: false
                    }, // Contoh: Belawan TIDAK terlayani
                    {
                        name: "Medan Deli",
                        deliverable: true
                    },
                    {
                        name: "Medan Denai",
                        deliverable: true
                    },
                    {
                        name: "Medan Helvetia",
                        deliverable: true
                    },
                    {
                        name: "Medan Johor",
                        deliverable: true
                    },
                    {
                        name: "Medan Kota",
                        deliverable: true
                    },
                    {
                        name: "Medan Labuhan",
                        deliverable: false
                    }, // Contoh: Labuhan TIDAK terlayani
                    {
                        name: "Medan Maimun",
                        deliverable: true
                    },
                    {
                        name: "Medan Marelan",
                        deliverable: false
                    }, // Contoh: Marelan TIDAK terlayani
                    {
                        name: "Medan Perjuangan",
                        deliverable: true
                    },
                    {
                        name: "Medan Petisah",
                        deliverable: true
                    },
                    {
                        name: "Medan Polonia",
                        deliverable: true
                    },
                    {
                        name: "Medan Selayang",
                        deliverable: true
                    },
                    {
                        name: "Medan Sunggal",
                        deliverable: true
                    },
                    {
                        name: "Medan Tembung",
                        deliverable: true
                    },
                    {
                        name: "Medan Timur",
                        deliverable: true
                    },
                    {
                        name: "Medan Tuntungan",
                        deliverable: true
                    },
                ],
                "Balige": [
                    // Asumsi semua kecamatan Balige berikut BISA diantar
                    {
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
                    // { name: "Bonan Dolok II", deliverable: false }, // Contoh jika ada yg tidak bisa
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
                ],
                "Siantar": [
                    // Asumsi semua kecamatan Siantar berikut BISA diantar
                    {
                        name: "Siantar Barat",
                        deliverable: true
                    },
                    {
                        name: "Siantar Marihat",
                        deliverable: true
                    },
                    {
                        name: "Siantar Marimbun",
                        deliverable: true
                    },
                    {
                        name: "Siantar Martoba",
                        deliverable: true
                    },
                    {
                        name: "Siantar Selatan",
                        deliverable: true
                    },
                    {
                        name: "Siantar Sitalasari",
                        deliverable: true
                    },
                    {
                        name: "Siantar Timur",
                        deliverable: true
                    },
                    {
                        name: "Siantar Utara",
                        deliverable: true
                    }
                ],
                "Lainnya": [{
                    name: "Konfirmasi Manual",
                    deliverable: true
                }] // Statusnya mungkin tidak relevan di sini
            };
            // --- END DATA KECAMATAN ---

            // Fungsi untuk menerapkan gaya dinamis berdasarkan tema yang dipilih
            function applyTheme(themeName) {
                const root = document.documentElement;

                if (themeName === 'dark') {
                    root.style.setProperty('--bg-color', '#343a40');
                    root.style.setProperty('--text-color', '#ffffff');
                } else {
                    root.style.setProperty('--bg-color', '#ffffff');
                    root.style.setProperty('--text-color', '#343a40');
                }
            }


            // Fungsi format Rupiah (tetap sama)
            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            // Ambil elemen modal dan form
            const orderModal = document.getElementById('orderModal');
            const orderForm = document.getElementById('orderForm');
            const modalItemName = document.getElementById('modalItemName');
            const modalItemPrice = document.getElementById('modalItemPrice');
            const modalBasePriceInput = document.getElementById('modalBasePrice');
            const modalMenuNameHidden = document.getElementById('modalMenuNameHidden');
            const modalItemImage = document.getElementById('modalItemImage');
            // Elemen baru
            const orderCitySelect = document.getElementById('orderCity');
            const orderDistrictSelect = document.getElementById('orderDistrict');
            const orderAddressTextarea = document.getElementById('orderAddress');
            // Elemen lama
            const orderGreetingTextarea = document.getElementById('orderGreeting');
            const orderQuantityInput = document.getElementById('orderQuantity');
            const modalTotalPriceSpan = document.getElementById('modalTotalPrice');
            const sendWhatsAppButton = document.getElementById('sendWhatsAppOrder');

            // Fungsi update total harga (tetap sama)
            function updateTotalPrice() {
                const basePrice = parseFloat(modalBasePriceInput.value) || 0;
                const quantity = parseInt(orderQuantityInput.value) || 1;
                if (quantity < 1) {
                    orderQuantityInput.value = 1;
                    return updateTotalPrice();
                }
                const totalPrice = basePrice * quantity;
                modalTotalPriceSpan.textContent = formatRupiah(totalPrice);
            }

            // --- FUNGSI populateDistricts DIMODIFIKASI UNTUK FILTER DELIVERABLE ---
            function populateDistricts() {
                const selectedCity = orderCitySelect.value;
                // Kosongkan dan nonaktifkan kecamatan dulu
                orderDistrictSelect.innerHTML =
                    '<option value="" selected disabled>-- Pilih Kecamatan --</option>';
                orderDistrictSelect.disabled = true;
                orderDistrictSelect.value = ""; // Reset pilihan

                if (selectedCity && cityDistricts[selectedCity]) {
                    const districts = cityDistricts[selectedCity];
                    let hasDeliverable = false; // Flag untuk cek apakah ada yg bisa diantar

                    districts.forEach(districtObject => {
                        // HANYA TAMBAHKAN JIKA deliverable === true
                        if (districtObject.deliverable === true) {
                            // Gunakan nama kecamatan sebagai teks dan value
                            const option = new Option(districtObject.name, districtObject.name);
                            orderDistrictSelect.add(option);
                            hasDeliverable = true; // Set flag jika ada minimal 1
                        }
                    });

                    // Aktifkan dropdown hanya jika ada kecamatan yang bisa diantar
                    if (hasDeliverable) {
                        orderDistrictSelect.disabled = false;
                    } else {
                        // Jika tidak ada yang bisa diantar di kota terpilih, beri pesan
                        orderDistrictSelect.innerHTML =
                            '<option value="" selected disabled>-- Maaf, tidak ada kec. terlayani --</option>';
                    }
                } else if (selectedCity === "") {
                    // Jika kembali ke pilihan default "-- Pilih Kota --"
                    orderDistrictSelect.innerHTML =
                        '<option value="" selected disabled>-- Pilih Kota Dulu --</option>';
                } else {
                    // Handle jika data kota tidak ditemukan (seharusnya tidak terjadi jika data 'cityDistricts' lengkap)
                    orderDistrictSelect.innerHTML =
                        '<option value="" selected disabled>-- Data Kec. tidak ditemukan --</option>';
                }
            }
            // --- AKHIR MODIFIKASI populateDistricts ---

            // Event listener saat modal akan ditampilkan (tetap sama)
            orderModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const menuName = button.getAttribute('data-menu-name');
                const menuPrice = parseFloat(button.getAttribute('data-menu-price'));
                const menuImage = button.getAttribute('data-menu-image');
                const menuLink = button.getAttribute('data-menu-link'); // Ambil tautan produk

                modalItemName.textContent = menuName;
                modalItemPrice.textContent = formatRupiah(menuPrice);
                modalBasePriceInput.value = menuPrice;
                modalMenuNameHidden.value = menuName;
                modalItemImage.src = menuImage;

                // Simpan tautan produk ke dalam elemen hidden
                document.getElementById('modalMenuLinkHidden').value = menuLink;

                orderForm.reset();
                orderQuantityInput.value = 1;

                // Reset dan nonaktifkan Kecamatan
                orderDistrictSelect.innerHTML =
                    '<option value="" selected disabled>-- Pilih Kecamatan --</option>';
                orderDistrictSelect.disabled = true;

                updateTotalPrice();
            });

            // Event listener saat Kota diubah (tetap sama, panggil fungsi yg sudah dimodif)
            orderCitySelect.addEventListener('change', populateDistricts);

            // Event listener saat jumlah diubah (tetap sama)
            orderQuantityInput.addEventListener('input', updateTotalPrice);

            // Event listener untuk tombol "Pesan via WhatsApp" (DIMODIFIKASI)
            sendWhatsAppButton.addEventListener('click', function () {
                // Validasi input wajib (tetap sama)
                if (orderCitySelect.value !== 'Balige') { // Validasi UTAMA
                    alert('Maaf, saat ini kami hanya melayani pemesanan dari wilayah Balige.');
                    orderCitySelect.focus();
                    return; // Batalkan pemesanan
                }
                if (!orderDistrictSelect.value || orderDistrictSelect.disabled || orderDistrictSelect
                    .options[orderDistrictSelect.selectedIndex]?.text.includes('--')) {
                    alert('Silakan pilih Kecamatan yang valid terlebih dahulu.');
                    orderDistrictSelect.focus();
                    return;
                }
                if (!orderAddressTextarea.value.trim()) {
                    alert('Silakan isi Alamat Lengkap.');
                    orderAddressTextarea.focus();
                    return;
                }
                if (parseInt(orderQuantityInput.value) < 1) {
                    alert('Jumlah pesanan minimal 1.');
                    orderQuantityInput.focus();
                    return;
                }

                // Ambil semua data dari form modal (tetap sama)
                const itemName = modalMenuNameHidden.value;
                const city = orderCitySelect.value;
                const district = orderDistrictSelect.value;
                const address = orderAddressTextarea.value.trim();
                const greeting = orderGreetingTextarea.value.trim();
                const quantity = orderQuantityInput.value;
                const totalPrice = modalTotalPriceSpan.textContent;
                const menuLink = document.getElementById('modalMenuLinkHidden').value; // Ambil tautan produk

                // Nomor WhatsApp Tujuan (Ganti dengan nomor Anda)
                const whatsAppNumber = '6281912591669';

                // Buat teks pesan WhatsApp
                let message = `Halo Ofel Kitchen, saya ingin memesan:\n\n`;
                message += `*Item:* ${itemName}\n`;
                message += `*Jumlah:* ${quantity} Pcs\n`;
                message += `*Total Harga:* ${totalPrice}\n`;
                message += `*Tautan Produk:* ${menuLink}\n\n`; // Tambahkan tautan produk ke pesan
                message += `*Detail Pengiriman:*\n`;
                message += `*Kota:* ${city}\n`;
                message += `*Kecamatan:* ${district}\n`;
                message += `*Alamat Lengkap:* ${address}\n`;
                if (greeting) {
                    message += `\n*Ucapan Tambahan:* ${greeting}\n`;
                }
                message += `\nMohon konfirmasi pesanannya. Terima kasih.`;

                const encodedMessage = encodeURIComponent(message);
                const whatsappURL = `https://wa.me/${whatsAppNumber}?text=${encodedMessage}`;

                window.open(whatsappURL, '_blank');

                // Tutup modal (opsional)
                var modalInstance = bootstrap.Modal.getInstance(orderModal);
                modalInstance.hide();
            });

            // JavaScript untuk Filter Kategori (Dropdown)
            document.addEventListener('DOMContentLoaded', function () {
                const categoryFilterDropdown = document.getElementById('categoryFilterDropdown');
                const menuItems = document.querySelectorAll('.menu-item');

                categoryFilterDropdown.addEventListener('change', function () {
                    const category = this.value;

                    menuItems.forEach(item => {
                         // Atur display dan opacity secara bersamaan
                        if (category === 'all' || item.dataset.category === category) {
                            item.classList.remove('fade-out');
                            item.classList.add('fade-in');
                            item.style.display = 'block';
                            item.style.opacity = 1;
                        } else {
                            item.classList.remove('fade-in');
                            item.
