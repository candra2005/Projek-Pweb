<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProduk = Produk::count();
        return view('admin.dashboard', compact('totalProduk'));
    }
}
