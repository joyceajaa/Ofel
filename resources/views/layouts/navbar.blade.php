<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a></li>
        <li><a href="{{ route('locations.indexPublic') }}" class="{{ request()->routeIs('locations.indexPublic') ? 'active' : '' }}">Location</a></li>
        <li><a href="{{ route('feedback') }}" class="{{ request()->routeIs('feedback') ? 'active' : '' }}">Feedback</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>

        @guest
            <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
        @endguest

        @auth
            @if (Auth::user()->is_admin)
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin Dashboard</a></li>
            @else
                <li class="nav-user-name"><span>Hello, {{ Auth::user()->name }}</span></li>
            @endif

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endauth
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    <style>
        .nav-user-name {
            margin: 5px 10px;
        }

        .nav-user-name span {
            color: rgba(255, 255, 255, 0.75); /* Warna link default */
            padding: 10px 15px;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-user-name span:hover {
            background-color: #495057; /* Warna hover link */
            color: #fff;
        }
    </style>
</nav>
