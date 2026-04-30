<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - SIJARING')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="brand">
                <i class="fa-solid fa-network-wired"></i> SIJARING Admin
            </div>
            <ul class="admin-nav">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge" style="width: 25px;"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-box" style="width: 25px;"></i> Kelola Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <i class="fa-solid fa-globe" style="width: 25px;"></i> Lihat Website
                    </a>
                </li>
                <li style="margin-top: auto;">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #ff6b6b;">
                        <i class="fa-solid fa-right-from-bracket" style="width: 25px;"></i> Logout
                    </a>
                </li>
            </ul>
        </aside>
        <main class="admin-content">
            <header class="admin-header">
                <h2>@yield('header', 'Dashboard')</h2>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span>Halo, <strong>Admin</strong></span>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary); color: white; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: var(--radius-sm); margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
