<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->take(3)->get();
        return view('home', compact('produks'));
    }

    public function tentang()
    {
        return view('tentang');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function kirimKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
