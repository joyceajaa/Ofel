<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Menus - {{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        .navmenu ul li span {
            color: #adb5bd;
            padding: 10px 15px;
            display: block;
        }
        .navmenu ul li form a {
             color: rgba(255, 255, 255, 0.75);
        }
         .navmenu ul li form a:hover {
             background-color: #dc3545;
             color: #fff;
         }
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
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
            <li><a href="{{ route('location') }}" class="{{ request()->routeIs('location') ? 'active' : '' }}">Location</a></li>
            <li><a href="{{ route('feedback') }}" class="{{ request()->routeIs('feedback') ? 'active' : '' }}">Feedback</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>

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
        <h1>Manage Menus</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-content">
            <div class="mb-3">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Tambah Menu Baru</a>
            </div>

            @if ($menus->isEmpty())
                <p>Belum ada menu yang ditambahkan.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    @if ($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="50">
                                    @else
                                        Tidak Ada Gambar
                                    @endif
                                </td>
                                <td>{{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td>{{ Str::limit($menu->description, 50) }}</td>
                                <td>
                                        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
