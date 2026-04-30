@extends('layouts.admin')

@section('title', 'Detail Produk - Admin SIJARING')
@section('header', 'Detail Produk')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.produk.index') }}" class="btn btn-outline" style="color: var(--text-main); border-color: var(--border-color);"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-primary" style="margin-left: 10px;"><i class="fa-solid fa-pen"></i> Edit Produk</a>
</div>

<div style="background: white; padding: 30px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); max-width: 900px; display: flex; flex-wrap: wrap; gap: 30px;">
    
    <div style="flex: 1; min-width: 300px;">
        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" style="width: 100%; border-radius: var(--radius-md); border: 1px solid var(--border-color);" onerror="this.src='{{ asset('images/access-point.png') }}'">
    </div>
    
    <div style="flex: 2; min-width: 300px;">
        <table class="table" style="border: none;">
            <tr>
                <td style="width: 150px; font-weight: 600; border: none; padding: 10px 0;">Kode Produk</td>
                <td style="border: none; padding: 10px 0;">: <span style="background: var(--bg-color); padding: 3px 8px; border-radius: 4px; font-family: monospace;">{{ $produk->kode_produk }}</span></td>
            </tr>
            <tr>
                <td style="font-weight: 600; border: none; padding: 10px 0;">Nama Produk</td>
                <td style="border: none; padding: 10px 0;">: {{ $produk->nama }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; border: none; padding: 10px 0;">Kategori</td>
                <td style="border: none; padding: 10px 0;">: <span style="color: var(--primary); font-weight: 500;">{{ $produk->kategori }}</span></td>
            </tr>
            <tr>
                <td style="font-weight: 600; border: none; padding: 10px 0;">Harga</td>
                <td style="border: none; padding: 10px 0;">: <span style="font-size: 1.2rem; font-weight: bold; color: var(--text-main);">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span></td>
            </tr>
            <tr>
                <td style="font-weight: 600; border: none; padding: 10px 0;">Stok</td>
                <td style="border: none; padding: 10px 0;">: 
                    @if($produk->stok > 0)
                        <span style="color: #2a9d8f; font-weight: bold;">{{ $produk->stok }} Unit</span>
                    @else
                        <span style="color: #e63946; font-weight: bold;">Habis</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="font-weight: 600; border: none; padding: 10px 0;">Tanggal Dibuat</td>
                <td style="border: none; padding: 10px 0;">: {{ $produk->created_at->format('d M Y H:i') }}</td>
            </tr>
            <tr>
                <td style="font-weight: 600; border: none; padding: 10px 0;">Terakhir Diupdate</td>
                <td style="border: none; padding: 10px 0;">: {{ $produk->updated_at->format('d M Y H:i') }}</td>
            </tr>
        </table>
        
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border-color);">
            <h4 style="margin-bottom: 10px;">Deskripsi:</h4>
            <p style="line-height: 1.6; color: var(--text-muted);">{{ $produk->deskripsi ?: 'Tidak ada deskripsi untuk produk ini.' }}</p>
        </div>
    </div>
    
</div>
@endsection
