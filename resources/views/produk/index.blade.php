@extends('layouts.app')

@section('title', 'Katalog Produk - SIJARING')

@section('content')
<div class="container" style="padding-top: 100px;">
    <h1 class="section-title">Katalog Produk</h1>
    
    <div class="product-grid" style="margin-bottom: 60px;">
        @foreach($produks as $produk)
        <div class="product-card">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="product-img" onerror="this.src='{{ asset('images/mikrotik.png') }}'">
            <div class="product-info">
                <span class="product-category">{{ $produk->kategori }}</span>
                <h3 class="product-title">{{ $produk->nama }}</h3>
                <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-primary" style="display: block; text-align: center;">Detail Produk</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
