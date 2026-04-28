<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{    public function run(): void
    {
        Produk::create([
            'kode_produk' => 'AP-001',
            'nama' => 'Ubiquiti UniFi AP AC Pro',
            'kategori' => 'access-point',
            'deskripsi' => 'Access point enterprise dual-band dengan kecepatan hingga 1750 Mbps. Cocok untuk kantor dan ruang publik.',
            'harga' => 2500000.00,
            'stok' => 15,
            'foto' => 'access-point.png',
            'spesifikasi' => 'Dual-Band 802.11ac, 3x3 MIMO, PoE+ Support, Range 122m',
            'tersedia' => true,
        ]);

        Produk::create([
            'kode_produk' => 'FO-001',
            'nama' => 'Kabel Fiber Optik Drop Core 1 Core 1000m',
            'kategori' => 'fiber-optik',
            'deskripsi' => 'Kabel fiber optik drop core single mode 1 core lengkap dengan seling baja. Sangat kuat untuk tarikan outdoor.',
            'harga' => 850000.00,
            'stok' => 20,
            'foto' => 'fiber-optik.png',
            'spesifikasi' => 'Single Mode, 1 Core, FTTH, 1000 Meter, Kawat Baja',
            'tersedia' => true,
        ]);

        Produk::create([
            'kode_produk' => 'UTP-001',
            'nama' => 'Belden Kabel UTP Cat 6 Original',
            'kategori' => 'kabel-utp',
            'deskripsi' => 'Kabel jaringan UTP Cat 6 berkualitas tinggi untuk transmisi data gigabit yang stabil dan awet.',
            'harga' => 1950000.00,
            'stok' => 10,
            'foto' => 'kabel-utp.jpg',
            'spesifikasi' => 'Category 6, 4 Pair, 1000 ft (305m), 24 AWG, Solid Bare Copper',
            'tersedia' => true,
        ]);

        Produk::create([
            'kode_produk' => 'MK-001',
            'nama' => 'MikroTik RB750Gr3 (hEX)',
            'kategori' => 'mikrotik',
            'deskripsi' => 'Router Gigabit Ethernet 5 port berukuran kecil namun kuat dengan CPU dual core 880MHz dan RAM 256MB.',
            'harga' => 950000.00,
            'stok' => 25,
            'foto' => 'mikrotik.png',
            'spesifikasi' => '5x Gigabit Ethernet, Dual Core 880MHz CPU, 256MB RAM, RouterOS L4',
            'tersedia' => true,
        ]);

        Produk::create([
            'kode_produk' => 'SW-001',
            'nama' => 'TP-Link 8-Port Gigabit Switch TL-SG108',
            'kategori' => 'switch',
            'deskripsi' => 'Switch hub unmanaged 8 port Gigabit desktop berbahan metal. Plug and play untuk memperluas jaringan wired Anda.',
            'harga' => 320000.00,
            'stok' => 30,
            'foto' => 'switch.png',
            'spesifikasi' => '8 Gigabit RJ45 Ports, Auto-MDI/MDIX, Steel Housing, Green Ethernet',
            'tersedia' => true,
        ]);

        Produk::create([
            'kode_produk' => 'AP-002',
            'nama' => 'TP-Link EAP225 Outdoor',
            'kategori' => 'access-point',
            'deskripsi' => 'Omada AC1200 Wireless MU-MIMO Gigabit Indoor/Outdoor Access Point, tahan cuaca untuk lingkungan ekstrem.',
            'harga' => 1250000.00,
            'stok' => 12,
            'foto' => 'access-point.png',
            'spesifikasi' => 'AC1200 Dual-Band, Omada Mesh, Weatherproof Enclosure, PoE Support',
            'tersedia' => true,
        ]);
    }
}
