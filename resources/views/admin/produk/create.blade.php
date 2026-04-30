@extends('layouts.admin')

@section('title', 'Tambah Produk - Admin SIJARING')
@section('header', 'Tambah Produk Baru')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.produk.index') }}" class="btn btn-outline" style="color: var(--text-main); border-color: var(--border-color);"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
</div>

<div style="background: white; padding: 30px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); max-width: 800px;">
    
    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: var(--radius-sm); margin-bottom: 20px; border: 1px solid #f5c6cb;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="kode_produk">Kode Produk *</label>
                <input type="text" id="kode_produk" name="kode_produk" class="form-control" value="{{ old('kode_produk') }}" required>
            </div>
            
            <div class="form-group">
                <label for="kategori">Kategori *</label>
                <select id="kategori" name="kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Router" {{ old('kategori') == 'Router' ? 'selected' : '' }}>Router</option>
                    <option value="Switch" {{ old('kategori') == 'Switch' ? 'selected' : '' }}>Switch</option>
                    <option value="Access Point" {{ old('kategori') == 'Access Point' ? 'selected' : '' }}>Access Point</option>
                    <option value="Kabel & Aksesoris" {{ old('kategori') == 'Kabel & Aksesoris' ? 'selected' : '' }}>Kabel & Aksesoris</option>
                    <option value="Server" {{ old('kategori') == 'Server' ? 'selected' : '' }}>Server</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="nama">Nama Produk *</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="harga">Harga (Rp) *</label>
                <input type="number" id="harga" name="harga" class="form-control" value="{{ old('harga') }}" required min="0">
            </div>
            
            <div class="form-group">
                <label for="stok">Stok *</label>
                <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok', 0) }}" required min="0">
            </div>
        </div>
        
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="gambar">Gambar Produk</label>
            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" style="padding: 9px 15px;">
            <small style="color: var(--text-muted); display: block; margin-top: 5px;">Maksimal 2MB. Format: JPG, JPEG, PNG.</small>
        </div>
        
        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan Produk</button>
        </div>
    </form>
</div>
@endsection
