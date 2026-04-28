@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin SIJARING')
@section('header', 'Kelola Produk')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Produk</a>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $key => $produk)
            <tr>
                <td>{{ $produks->firstItem() + $key }}</td>
                <td>
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;" onerror="this.src='{{ asset('images/access-point.png') }}'">
                </td>
                <td><span style="background: var(--bg-color); padding: 3px 8px; border-radius: 4px; font-size: 0.85rem; font-family: monospace;">{{ $produk->kode_produk }}</span></td>
                <td style="font-weight: 500;">{{ $produk->nama }}</td>
                <td>{{ $produk->kategori }}</td>
                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td>
                    @if($produk->stok > 0)
                        <span style="color: #2a9d8f; font-weight: bold;">{{ $produk->stok }}</span>
                    @else
                        <span style="color: #e63946; font-weight: bold;">Habis</span>
                    @endif
                </td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('admin.produk.show', $produk->id) }}" class="btn btn-outline" style="padding: 5px 10px; color: var(--primary); border-color: var(--primary);" title="Detail"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-outline" style="padding: 5px 10px; color: #f4a261; border-color: #f4a261;" title="Edit"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="padding: 5px 10px; color: #e63946; border-color: #e63946;" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center; padding: 30px;">Belum ada data produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $produks->links() }}
    </div>
</div>
@endsection
