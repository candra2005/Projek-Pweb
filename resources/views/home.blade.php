@extends('layouts.app')

@section('title', 'Beranda - SIJARING')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Infrastruktur Jaringan Berkualitas</h1>
        <p>Solusi terbaik untuk kebutuhan jaringan perusahaan, instansi, dan personal. Kami menyediakan perangkat berkualitas dengan dukungan teknis profesional.</p>
        <a href="{{ route('produk.index') }}" class="btn btn-primary">Lihat Katalog Produk</a>
        <a href="{{ route('tentang') }}" class="btn btn-outline" style="margin-left: 10px;">Pelajari Lebih Lanjut</a>
    </div>
</section>

<!-- Produk Unggulan Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Produk Unggulan</h2>
        
        <div class="product-grid">
            @foreach($produks as $produk)
            <div class="product-card">
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="product-img" onerror="this.src='{{ asset('images/kabel-utp.jpg') }}'">
                <div class="product-info">
                    <span class="product-category">{{ $produk->kategori }}</span>
                    <h3 class="product-title">{{ $produk->nama }}</h3>
                    <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary); display: block; text-align: center;">Detail Produk</a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('produk.index') }}" class="btn btn-primary">Lihat Semua Produk <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
