<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feedback</title>

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
        .btn-primary, .btn-danger, .btn-warning, .btn-info {  /* Menambahkan styling untuk btn-warning dan btn-info */
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-danger:hover, .btn-warning:hover, .btn-info:hover { /* Menambahkan styling untuk btn-warning dan btn-info */
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
                    <h1 class="h3 mb-2 text-gray-800">Manage Feedback</h1>  <!-- Ubah Page Heading -->
                    <p class="mb-4">Kelola daftar feedback Anda di sini.</p> <!-- Ubah Deskripsi -->

                    <!-- Tombol Tambah Feedback -->
                    <div class="mb-3">
                        <a href="{{ route('admin.feedback.create') }}" class="btn btn-primary">Tambah Feedback</a> <!-- Ubah Label Tombol -->
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Feedback</h6>
                        </div>
                        <div class="card-body">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif



                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th>Foto</th>
                                            <th>Video</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbacks as $feedback)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $feedback->name }}</td>
                                                <td>{{ $feedback->email }}</td>
                                                <td>{{ Str::limit($feedback->message, 50) }}</td>
                                                <td>
                                                    @if ($feedback->image)
                                                        <a href="{{ asset('storage/' . $feedback->image) }}" target="_blank">
                                                            <img src="{{ asset('storage/' . $feedback->image) }}" alt="Foto" class="img-thumbnail">
                                                        </a>
                                                    @else
                                                        <span class="text-muted">Tidak ada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($feedback->video)
                                                        <div class="video-container">
                                                            <video controls>
                                                                <source src="{{ asset('storage/' . $feedback->video) }}" type="video/mp4">
                                                                Browser tidak mendukung pemutaran video.
                                                            </video>
                                                        </div>
                                                    @else
                                                        <span class="text-muted">Tidak ada</span>
                                                    @endif
                                                </td>
                                                <td>{{ $feedback->created_at->format('d M Y, H:i') }}</td>
                                                <td>
                                                    <!-- Tombol Lihat (Opsional, jika ada view show) -->
                                                    <!-- @if (Route::has('admin.feedback.show'))
                                                        <a href="{{ route('admin.feedback.show', $feedback->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                                    @endif -->

                                                    <a href="{{ route('admin.feedback.edit', $feedback->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $feedbacks->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer (Sama seperti di kode dashboard) -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin.modal.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</body>

</html>