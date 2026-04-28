@extends('layouts.admin')

@section('title', 'Dashboard - Admin SIJARING')
@section('header', 'Dashboard')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
    <!-- Card Statistik -->
    <div style="background: white; padding: 25px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); border-left: 5px solid var(--primary);">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="color: var(--text-muted); font-size: 1rem; margin-bottom: 5px;">Total Produk</h3>
                <h2 style="font-size: 2.5rem; color: var(--primary-dark);">{{ $totalProduk }}</h2>
            </div>
            <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(0, 119, 182, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-box-open"></i>
            </div>
        </div>
    </div>
    
    <div style="background: white; padding: 25px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); border-left: 5px solid var(--secondary);">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="color: var(--text-muted); font-size: 1rem; margin-bottom: 5px;">Kunjungan Hari Ini</h3>
                <h2 style="font-size: 2.5rem; color: var(--primary-dark);">128</h2>
            </div>
            <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(0, 180, 216, 0.1); color: var(--secondary); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-chart-line"></i>
            </div>
        </div>
    </div>
    
    <div style="background: white; padding: 25px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); border-left: 5px solid #2a9d8f;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="color: var(--text-muted); font-size: 1rem; margin-bottom: 5px;">Pesan Masuk</h3>
                <h2 style="font-size: 2.5rem; color: var(--primary-dark);">5</h2>
            </div>
            <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(42, 157, 143, 0.1); color: #2a9d8f; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>
    </div>
</div>

<div style="background: white; padding: 25px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
    <h3 style="margin-bottom: 20px; color: var(--primary-dark);">Selamat Datang di Panel Admin</h3>
    <p style="color: var(--text-main);">Gunakan menu di sebelah kiri untuk mengelola konten website SIJARING. Anda dapat menambah, mengedit, dan menghapus data produk yang akan ditampilkan di halaman publik.</p>
    
    <div style="margin-top: 30px;">
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Produk Baru</a>
    </div>
</div>
@endsection
