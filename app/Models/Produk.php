<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'nama',
        'kategori',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'spesifikasi',
        'tersedia'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'tersedia' => 'boolean',
    ];

    public function scopeTersedia($query)
    {
        return $query->where('tersedia', true);
    }
}
