@extends('layouts.app')

@section('title', 'Hubungi Kami - SIJARING')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 80px;">
    <h1 class="section-title">Hubungi Kami</h1>
    
    <div style="display: flex; flex-wrap: wrap; gap: 40px; margin-top: 50px;">
        <!-- Info Kontak -->
        <div style="flex: 1; min-width: 300px;">
            <h3 style="color: var(--primary-dark); margin-bottom: 20px;">Informasi Kontak</h3>
            <p style="color: var(--text-muted); margin-bottom: 30px;">Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan mengenai produk, penawaran harga, atau dukungan teknis.</p>
            
            <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 20px;">
                <div style="background: var(--primary-light); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 5px;">Alamat</h4>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">Jl. Teknologi Jaringan No. 128<br>Jakarta Selatan, 12345</p>
                </div>
            </div>
            
            <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 20px;">
                <div style="background: var(--primary-light); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 5px;">Telepon</h4>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">+62 21 555 0123</p>
                </div>
            </div>
            
            <div style="display: flex; align-items: flex-start; gap: 15px;">
                <div style="background: var(--primary-light); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 5px;">Email</h4>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">info@sijaring.com</p>
                </div>
            </div>
        </div>
        
        <!-- Form Kontak -->
        <div style="flex: 1; min-width: 300px; background: white; padding: 30px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
            <h3 style="color: var(--primary-dark); margin-bottom: 20px;">Kirim Pesan</h3>
            
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: var(--radius-sm); margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('kontak.kirim') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control" required placeholder="Masukkan nama Anda">
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="email@contoh.com">
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan / Pertanyaan</label>
                    <textarea id="pesan" name="pesan" rows="5" class="form-control" required placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>
@endsection
