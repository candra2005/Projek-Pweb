@extends('layouts.app')

@section('title', $produk->nama . ' - SIJARING')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 80px;">
    <a href="{{ route('produk.index') }}" style="display: inline-block; margin-bottom: 20px;"><i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog</a>
    
    <div style="display: flex; flex-wrap: wrap; gap: 40px; background: white; padding: 30px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
        <div style="flex: 1; min-width: 300px;">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" style="width: 100%; border-radius: var(--radius-md); border: 1px solid var(--border-color);" onerror="this.src='{{ asset('images/access-point.png') }}'">
        </div>
        
        <div style="flex: 1; min-width: 300px;">
            <span class="product-category" style="font-size: 1rem;">{{ $produk->kategori }}</span>
            <h1 style="color: var(--primary-dark); font-size: 2.5rem; margin-bottom: 15px;">{{ $produk->nama }}</h1>
            
            <p style="color: var(--text-muted); margin-bottom: 20px;">Kode Produk: <strong>{{ $produk->kode_produk }}</strong></p>
            
            <h2 class="product-price" style="font-size: 2rem; color: var(--primary); margin-bottom: 25px;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h2>
            
            <div style="margin-bottom: 25px;">
                <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Deskripsi:</h3>
                <p style="line-height: 1.8;">{{ $produk->deskripsi ?: 'Belum ada deskripsi untuk produk ini.' }}</p>
            </div>
            
            <div style="margin-bottom: 30px;">
                <p>Status Stok: 
                    @if($produk->stok > 0)
                        <span style="color: #2a9d8f; font-weight: bold;"><i class="fa-solid fa-check-circle"></i> Tersedia ({{ $produk->stok }})</span>
                    @else
                        <span style="color: #e63946; font-weight: bold;"><i class="fa-solid fa-times-circle"></i> Habis</span>
                    @endif
                </p>
            </div>
            
            <a href="{{ route('kontak') }}" class="btn btn-primary" style="width: 100%; text-align: center;"><i class="fa-solid fa-envelope"></i> Pesan Sekarang</a>
        </div>
    </div>
</div>
@endsection
