<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIJARING - Sistem Informasi Jaringan')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <i class="fa-solid fa-network-wired"></i> SIJARING
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">Produk</a></li>
                <li><a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="color: white;">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary);">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer style="background: var(--text-main); color: white; padding: 40px 0; text-align: center; margin-top: 50px;">
        <div class="container">
            <p>&copy; {{ date('Y') }} SIJARING. Hak Cipta Dilindungi.</p>
            <p style="opacity: 0.7; font-size: 0.9rem; margin-top: 10px;">Proyek Tugas Akhir Pemrograman Web</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
