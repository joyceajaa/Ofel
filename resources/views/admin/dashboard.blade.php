<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard - {{ config('app.name', 'Laravel') }}</title>

    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f6f9; color: #333; }
        .admin-container { max-width: 1200px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .success-message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: .75rem 1.25rem; margin-bottom: 1rem; border-radius: .25rem; }
        .admin-content h1, .admin-content h2 { color: #444; }
        .admin-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .admin-card { background-color: #e9ecef; padding: 20px; border-radius: 5px; text-align: center; }
        .admin-card h3 { margin-top: 0; }

        .navmenu { background-color: #343a40; padding: 0; }
        .navmenu ul { list-style: none; padding: 0 15px; margin: 0; display: flex; flex-wrap: wrap; justify-content: center; align-items: center; min-height: 60px; }
        .navmenu ul li { margin: 5px 10px; }
        .navmenu ul li a { color: rgba(255, 255, 255, 0.75); text-decoration: none; padding: 10px 15px; display: block; border-radius: 4px; transition: background-color 0.3s, color 0.3s; }
        .navmenu ul li a:hover { background-color: #495057; color: #fff; }
        .navmenu ul li a.active { color: #fff; background-color: #007bff; }
        .navmenu ul li span { color: #adb5bd; padding: 10px 15px; display: block; }
        .navmenu ul li form a { color: rgba(255, 255, 255, 0.75); }
        .navmenu ul li form a:hover { background-color: #dc3545; color: #fff; }
        .mobile-nav-toggle { display: none; color: white; font-size: 28px; cursor: pointer; padding: 0 15px; }
        @media (max-width: 991px) {
        }
    </style>
</head>

<body class="antialiased">

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('admin.menus.index') }}" class="{{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">Manage Menus</a></li>
            <li><a href="{{ route('admin.about') }}" class="{{ request()->routeIs('admin.about') ? 'active' : '' }}">Manage About Us</a></li>
            <li><a href="{{ route('admin.location') }}" class="{{ request()->routeIs('admin.location') ? 'active' : '' }}">Manage Location</a></li>
            <li><a href="{{ route('admin.feedback') }}" class="{{ request()->routeIs('admin.feedback') ? 'active' : '' }}">Manage Feedback</a></li>
            <li><a href="{{ route('admin.contact') }}" class="{{ request()->routeIs('admin.contact') ? 'active' : '' }}">Manage Contact</a></li>

            @guest
                <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Registrasi</a></li>
            @endguest

            @auth
                @if (Auth::user()->is_admin)
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin Dashboard</a></li>
                @else
                    <li><span>Halo, {{ Str::limit(Auth::user()->name, 15) }}</span></li>
                @endif

                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                </li>
            @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <div class="admin-container">
        <h1>Admin Dashboard</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-content">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p>Ini adalah area kontrol administrasi. Dari sini Anda dapat mengelola berbagai aspek situs.</p>

            <div class="admin-grid">
                <div class="admin-card">
                    <h3>Kelola Pengguna</h3>
                    <p>Lihat, edit, atau hapus data pengguna.</p>
                    <a href="#" class="btn btn-primary">Go</a>
                </div>
                <div class="admin-card">
                    <h3>Kelola Menu</h3>
                    <p>Tambah, edit, atau hapus item menu.</p>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-primary">Go</a>
                </div>
                <div class="admin-card">
                    <h3>Lihat Feedback</h3>
                    <p>Baca feedback yang dikirim oleh pengguna.</p>
                    <a href="{{ route('admin.feedback') }}" class="btn btn-primary">Go</a>
                </div>
                <div class="admin-card">
                    <h3>Pengaturan Situs</h3>
                    <p>Konfigurasi pengaturan umum situs.</p>
                    <a href="#" class="btn btn-primary">Go</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
