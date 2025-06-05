<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Manage Wilayahs">
    <meta name="author" content="">

    <title>Manage Wilayahs - {{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

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
            max-width: 150px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .img-thumbnail:hover {
             transform: scale(1.1);
             box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Enhancement for Buttons */
        .btn-primary, .btn-danger, .btn-warning, .btn-info {
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-danger:hover, .btn-warning:hover, .btn-info:hover {
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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            @include('admin.sidebar')
        </ul>
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
                    <h1 class="h3 mb-2 text-gray-800">Manage Wilayahs</h1>
                    <p class="mb-4">Kelola daftar wilayah Anda di sini.</p>

                    <!-- Tombol Tambah Wilayah Baru -->
                    <div class="mb-3">
                        <a href="{{ route('admin.wilayahs.create') }}" class="btn btn-primary">Tambah Wilayah Baru</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Wilayah</h6>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <div class="table-responsive">
                                @if ($wilayahs->isEmpty())
                                    <p>Belum ada wilayah yang ditambahkan.</p>
                                @else
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wilayahs as $wilayah)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $wilayah->nama }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.wilayahs.edit', $wilayah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.wilayahs.destroy', $wilayah->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus wilayah ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
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

    <!-- Logout Modal -->
    @include('admin.modal.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</body>

</html>