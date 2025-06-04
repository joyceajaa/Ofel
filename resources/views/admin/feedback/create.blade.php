<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Feedback Baru</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        .footer.dark-background {
            background-color: #343a40;
            color: white;
        }

        .footer.dark-background a {
            color: #aaa;
        }

        .footer.dark-background a:hover {
            color: white;
        }

        .footer.dark-background .icon {
            color: #5cb85c;
        }

        /* Custom CSS for improved look and responsiveness */
        .dataTables_wrapper .row {
            margin-bottom: 15px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .img-thumbnail {
            max-width: 150px; /* Increased max-width */
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .img-thumbnail:hover {
             transform: scale(1.1);
             box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Increase video size */
        .video-container {
            width: 240px; /* Increased width */
            height: 135px; /* Increased height, maintaining aspect ratio */
            margin: 0 auto; /* Center the video */
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure video fills the container */
        }

        /* Adjustments for better responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            #content-wrapper {
                margin-left: 0;
            }

            .table-responsive {
                border: none;
            }
        }

        @media (max-width: 576px) {
            .table-responsive {
                overflow-x: scroll;
            }
        }

        /* Enhancement for Buttons */
        .btn-primary, .btn-danger {
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-danger:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.15);
        }

        /* Table Header Styling */
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        /* Improve Modal Appearance */
        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        /* Add a subtle background pattern */
        body {
            background-size: cover;
            background-attachment: fixed;
        }

        /* Style links in the table for better visibility */
        .table a {
            color: #007bff;
            text-decoration: none;
        }

        .table a:hover {
            text-decoration: underline;
        }

        /* Animation for the page title */
        .page-title {
            animation: fadeInUp 1s ease;
        }

        /* Animated gradient for the add button */
        .btn-primary.add-button {
            background: linear-gradient(to right, #4CAF50, #2E7D32);
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary.add-button:hover {
            background: linear-gradient(to right, #2E7D32, #4CAF50);
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Add animation to the table rows */
        .table tbody tr {
            animation: fadeIn 0.7s ease-in-out forwards;
            opacity: 0;
        }

        .table tbody tr:nth-child(odd) {
            animation-delay: 0.1s;
        }

        .table tbody tr:nth-child(even) {
            animation-delay: 0.2s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Keyframe animation for fadeInUp (using Animate.css) */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 20px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Tambah Feedback Baru</h1>
                    </div>

                    <!-- Form untuk Menambah Feedback -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Feedback</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.feedback.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Nama:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="message">Pesan:</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Foto:</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video">Video:</label>
                                    <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video">
                                    @error('video')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('admin.feedback.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    @include('admin.modal.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>