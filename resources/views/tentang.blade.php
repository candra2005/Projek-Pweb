@extends('layouts.app')

@section('title', 'Tentang Kami - SIJARING')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 80px;">
    <h1 class="section-title">Tentang SIJARING</h1>
    
    <div style="display: flex; flex-wrap: wrap; gap: 40px; align-items: center; margin-top: 50px;">
        <div style="flex: 1; min-width: 300px;">
            <img src="{{ asset('images/logo.png') }}" alt="Tentang SIJARING" style="width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-md);" onerror="this.src='https://placehold.co/600x400/0077b6/ffffff?text=SIJARING'">
        </div>
        
        <div style="flex: 1; min-width: 300px;">
            <h2 style="color: var(--primary-dark); margin-bottom: 20px;">Mitra Infrastruktur Jaringan Anda</h2>
            <p style="margin-bottom: 15px; font-size: 1.1rem;">SIJARING (Sistem Informasi Jaringan) adalah perusahaan yang berdedikasi menyediakan perangkat jaringan komputer terbaik sejak tahun 2020.</p>
            <p style="margin-bottom: 15px; color: var(--text-muted);">Kami memahami bahwa konektivitas adalah tulang punggung operasional bisnis modern. Oleh karena itu, kami berkomitmen untuk mendistribusikan produk-produk berkualitas tinggi dari brand terkemuka seperti Mikrotik, Cisco, Ubiquiti, dan lainnya.</p>
            
            <div style="margin-top: 30px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="background: white; padding: 20px; border-radius: var(--radius-sm); box-shadow: var(--shadow-sm); border-left: 4px solid var(--primary);">
                    <h3 style="color: var(--primary);"><i class="fa-solid fa-bullseye"></i> Visi</h3>
                    <p style="font-size: 0.9rem; margin-top: 10px;">Menjadi penyedia solusi jaringan terpercaya dengan jangkauan nasional.</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: var(--radius-sm); box-shadow: var(--shadow-sm); border-left: 4px solid var(--secondary);">
                    <h3 style="color: var(--secondary);"><i class="fa-solid fa-rocket"></i> Misi</h3>
                    <p style="font-size: 0.9rem; margin-top: 10px;">Menyediakan produk original, layanan konsultasi andal, dan after-sales terbaik.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
