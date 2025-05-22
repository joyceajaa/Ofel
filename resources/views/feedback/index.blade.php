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
    <link href="{{ URL::asset('assets/vendor/aos/aos.js') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
            color: #333;
        }

        /* Header */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
        }

        .logo img {
            width: 140px;
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
        }

        /* Feedback Section */
        .feedback-section {
            padding: 40px 0;
            background: #f9fafc;
        }

        .feedback-card {
            background-color: #ffffff;
            border-left: 5px solid rgb(207, 19, 28);
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.06);
            padding: 20px;
        }

        .feedback-card h2 {
            font-size: 22px;
            font-weight: 500;
            color: rgb(207, 19, 28);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .feedback-card h2::before {
            content: "💬";
        }

        .feedback-card p {
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .feedback-item {
            border-bottom: 1px dashed #ddd;
            padding: 15px 0;
            transition: background-color 0.2s ease;
        }

        .feedback-item:hover {
            background-color: #fefefe;
        }

        .feedback-name {
            font-weight: 500;
            font-size: 16px;
            color: #222;
        }

        .feedback-email {
            font-size: 12px;
            color: #888;
        }

        .feedback-message {
            margin-top: 8px;
            font-size: 14px;
            line-height: 1.4;
            color: #555;
        }

        .media-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .media-item {
            flex: 1 1 30%; /* Adjust to reduce the size of media items */
            max-width: 120px; /* Limit the maximum width of media items */
        }

        .media-item img,
        .media-item video {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .text-muted {
            display: inline-block;
            background: #f1f1f1;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 11px;
            margin-top: 6px;
        }

        .empty-feedback {
            text-align: center;
            padding: 40px 0;
        }

        .empty-feedback img {
            max-width: 140px;
            opacity: 0.7;
        }

        .empty-feedback p {
            margin-top: 12px;
            font-size: 14px;
            color: #888;
        }

        /* Footer & Scroll */
        footer {
            background-color: #222;
            color: #fff;
            padding: 30px 0;
        }

        footer .social-links a {
            margin: 0 6px;
            font-size: 16px;
        }

        #scroll-top {
            position: fixed;
            bottom: 12px;
            right: 12px;
            padding: 8px;
            font-size: 14px;
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
            <a></a>
            <a></a>
        </div>
    </header>

    <main class="main">
        <section id="feedback" class="feedback-section">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="feedback-card" data-aos="fade-up">
                            <h2>Customer Feedback</h2>
                            <p>What our customers are saying about us!</p>

                            <div class="feedback-list">
                                @if ($feedbacks->isEmpty())
                                    <div class="empty-feedback">
                                        <img src="{{ asset('assets/img/empty-feedback.svg') }}" alt="No Feedback">
                                        <p>Belum ada tanggapan. Jadilah yang pertama memberikan feedback!</p>
                                    </div>
                                @else
                                    @foreach ($feedbacks as $feedback)
                                        <div class="feedback-item">
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
                                                        <video controls style="max-width: 100%; height: auto;">
                                                            <source src="{{ asset('storage/' . $feedback->video) }}"
                                                                type="video/mp4">
                                                            Browser tidak mendukung video.
                                                        </video>
                                                    </div>
                                                @endif
                                            </div>

                                            <small class="text-muted">
                                                Diterima pada: {{ $feedback->created_at->format('Y-m-d H:i') }}
                                            </small>
                                        </div>
                                    @endforeach

                                    <!-- Pagination -->
                                    <div class="mt-4">
                                        {{ $feedbacks->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

    <a href="#" id="scroll-top" class="scroll-top"><i class="bi bi-arrow-up-short"></i></a>

    <!-- JS -->
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
</body>

</html>
