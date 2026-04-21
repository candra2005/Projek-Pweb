// SiJaring - Sistem Manajemen Inventaris Mini
// Tugas Praktik Pemrograman Web

// ----- data utama -----
const KUNCI = 'sijaring-data-barang';
let daftarBarang = [];
let indexEdit = -1;

// ambil elemen form
const formInput      = document.getElementById('form-input');
const inputKode      = document.getElementById('kode_barang');
const inputNama      = document.getElementById('nama_barang');
const inputKategori  = document.getElementById('kategori');
const inputStok      = document.getElementById('stok');
const inputHarga     = document.getElementById('harga');
const inputTanggal   = document.getElementById('tanggal_masuk');

const judulForm      = document.getElementById('judul-form');
const tombolSubmit   = document.getElementById('tombol-submit');
const tombolBatal    = document.getElementById('tombol-batal');
const notifikasi     = document.getElementById('notifikasi');

// elemen tabel & toolbar
const inputCari      = document.getElementById('input-cari');
const selectFilter   = document.getElementById('filter-kategori');
const tbodyBarang    = document.getElementById('tbody-barang');
const infoKosong     = document.getElementById('info-kosong');

// elemen statistik
const statTotalItem    = document.getElementById('stat-total-item');
const statTotalNilai   = document.getElementById('stat-total-nilai');
const statStokMenipis  = document.getElementById('stat-stok-menipis');
const ringkasanKategori = document.getElementById('ringkasan-kategori');


// ====== localStorage ======
function muatData() {
    const tersimpan = localStorage.getItem(KUNCI);
    if (tersimpan) {
        daftarBarang = JSON.parse(tersimpan);
    } else {
        daftarBarang = [];
    }
}

const simpanData = () => {
    localStorage.setItem(KUNCI, JSON.stringify(daftarBarang));
};


// ====== format angka & tanggal ======
function formatRupiah(angka) {
    let teks = String(angka);
    let hasil = '';
    let hitung = 0;

    // jalan dari belakang, sisipkan titik tiap 3 angka
    for (let i = teks.length - 1; i >= 0; i--) {
        hasil = teks[i] + hasil;
        hitung++;
        if (hitung % 3 === 0 && i !== 0) {
            hasil = '.' + hasil;
        }
    }
    return 'Rp ' + hasil;
}

function formatTanggal(tgl) {
    // tgl bentuknya "2026-03-05"
    const namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const bagian = tgl.split('-');
    const tahun = bagian[0];
    const bulan = namaBulan[Number(bagian[1]) - 1];
    const hari = bagian[2];
    return hari + ' ' + bulan + ' ' + tahun;
}


// ====== notifikasi ======
function tampilkanNotifikasi(pesan, tipe) {
    notifikasi.textContent = pesan;
    notifikasi.className = 'notifikasi tampil ' + tipe;
    setTimeout(function () {
        notifikasi.className = 'notifikasi';
    }, 2500);
}


// ====== validasi form ======
// aturan setiap field: pola regex + pesan kalau salah
const aturan = {
    kode_barang: {
        pola: /^[A-Za-z0-9\-]{3,15}$/,
        pesan: 'Kode 3-15 karakter (huruf, angka, tanda hubung)'
    },
    nama_barang: {
        pola: /^.{3,50}$/,
        pesan: 'Nama minimal 3 karakter'
    },
    kategori: {
        pola: /^(Router|Switch|Kabel|Wireless|Aksesoris)$/,
        pesan: 'Pilih kategori'
    },
    stok: {
        pola: /^[0-9]+$/,
        pesan: 'Stok harus angka (>= 0)'
    },
    harga: {
        pola: /^[0-9]+$/,
        pesan: 'Harga harus angka (>= 0)'
    },
    tanggal_masuk: {
        pola: /^\d{4}-\d{2}-\d{2}$/,
        pesan: 'Tanggal wajib diisi'
    }
};

function cekField(idField, nilai) {
    const cekPesan = document.getElementById('error-' + idField);
    const cekInput = document.getElementById(idField);

    // kosong
    if (!nilai || nilai.trim() === '') {
        cekPesan.textContent = 'Field ini wajib diisi';
        cekInput.classList.add('invalid');
        return false;
    }

    // tidak sesuai aturan
    if (!aturan[idField].pola.test(nilai.trim())) {
        cekPesan.textContent = aturan[idField].pesan;
        cekInput.classList.add('invalid');
        return false;
    }

    // valid
    cekPesan.textContent = '';
    cekInput.classList.remove('invalid');
    return true;
}

function cekSemua() {
    const data = ambilDataForm();
    let semuaBenar = true;

    // cek satu per satu, jangan break biar pesan error tampil di semua field
    for (const id in aturan) {
        const benar = cekField(id, data[id]);
        if (!benar) semuaBenar = false;
    }

    return semuaBenar;
}


// ====== ambil & reset form ======
function ambilDataForm() {
    return {
        kode_barang: inputKode.value,
        nama_barang: inputNama.value,
        kategori: inputKategori.value,
        stok: inputStok.value,
        harga: inputHarga.value,
        tanggal_masuk: inputTanggal.value
    };
}

function resetForm() {
    formInput.reset();
    indexEdit = -1;
    judulForm.textContent = 'Form Tambah Barang';
    tombolSubmit.textContent = 'Simpan Barang';

    // bersihkan pesan error
    for (const id in aturan) {
        document.getElementById('error-' + id).textContent = '';
        document.getElementById(id).classList.remove('invalid');
    }
}


// ====== render tabel ======
function tampilkanTabel() {
    const kataKunci = inputCari.value.toLowerCase();
    const kategoriDipilih = selectFilter.value;

    // filter dulu sesuai pencarian + kategori
    const dataTampil = daftarBarang.filter(function (barang) {
        const cocokKategori = kategoriDipilih === '' || barang.kategori === kategoriDipilih;
        const cocokCari = kataKunci === '' ||
            barang.nama_barang.toLowerCase().includes(kataKunci) ||
            barang.kode_barang.toLowerCase().includes(kataKunci);
        return cocokKategori && cocokCari;
    });

    // kosong?
    if (dataTampil.length === 0) {
        tbodyBarang.innerHTML = '';
        infoKosong.classList.remove('sembunyi');
        if (daftarBarang.length === 0) {
            infoKosong.textContent = 'Belum ada barang. Silakan tambahkan melalui form di atas.';
        } else {
            infoKosong.textContent = 'Tidak ada barang yang cocok dengan pencarian/filter.';
        }
        return;
    }

    infoKosong.classList.add('sembunyi');

    // bangun baris-baris tabel
    let isiTabel = '';
    dataTampil.forEach(function (barang) {
        // cari index asli supaya tombol edit/hapus tahu data mana
        const indexAsli = daftarBarang.findIndex(b => b.kode_barang === barang.kode_barang);

        let kolomStok;
        if (Number(barang.stok) < 5) {
            kolomStok = '<span class="badge-stok-menipis">' + barang.stok + '</span>';
        } else {
            kolomStok = barang.stok;
        }

        isiTabel += `
            <tr>
                <td>${indexAsli + 1}</td>
                <td><strong>${barang.kode_barang}</strong></td>
                <td>${barang.nama_barang}</td>
                <td><span class="badge-kategori">${barang.kategori}</span></td>
                <td>${kolomStok}</td>
                <td>${formatRupiah(barang.harga)}</td>
                <td>${formatTanggal(barang.tanggal_masuk)}</td>
                <td>
                    <button type="button" class="tombol-aksi tombol-edit" data-aksi="edit" data-index="${indexAsli}">Edit</button>
                    <button type="button" class="tombol-aksi tombol-hapus" data-aksi="hapus" data-index="${indexAsli}">Hapus</button>
                </td>
            </tr>
        `;
    });

    tbodyBarang.innerHTML = isiTabel;
}


// ====== render statistik ======
function tampilkanStatistik() {
    // total jenis barang
    const totalItem = daftarBarang.length;

    // total nilai = stok x harga, dijumlahkan
    let totalNilai = 0;
    daftarBarang.forEach(function (barang) {
        totalNilai += Number(barang.stok) * Number(barang.harga);
    });

    // hitung stok menipis (< 5)
    const stokMenipis = daftarBarang.filter(b => Number(b.stok) < 5).length;

    statTotalItem.textContent = totalItem;
    statTotalNilai.textContent = formatRupiah(totalNilai);
    statStokMenipis.textContent = stokMenipis;

    // ringkasan jumlah per kategori
    const perKategori = {};
    daftarBarang.forEach(function (barang) {
        if (perKategori[barang.kategori]) {
            perKategori[barang.kategori]++;
        } else {
            perKategori[barang.kategori] = 1;
        }
    });

    const daftarKey = Object.keys(perKategori);
    if (daftarKey.length === 0) {
        ringkasanKategori.innerHTML = '<li>Belum ada data <span>0</span></li>';
    } else {
        let isi = '';
        daftarKey.forEach(function (kat) {
            isi += '<li>' + kat + ' <span>' + perKategori[kat] + ' jenis</span></li>';
        });
        ringkasanKategori.innerHTML = isi;
    }
}


// ====== aksi tambah / update ======
function simpanBarang(e) {
    e.preventDefault();

    if (!cekSemua()) {
        tampilkanNotifikasi('Harap perbaiki kesalahan pada form', 'error');
        return;
    }

    const data = ambilDataForm();
    const barangBaru = {
        kode_barang: data.kode_barang.trim(),
        nama_barang: data.nama_barang.trim(),
        kategori: data.kategori,
        stok: Number(data.stok),
        harga: Number(data.harga),
        tanggal_masuk: data.tanggal_masuk
    };

    if (indexEdit === -1) {
        // mode tambah - cek dulu kode-nya jangan dobel
        const sudahAda = daftarBarang.some(b =>
            b.kode_barang.toLowerCase() === barangBaru.kode_barang.toLowerCase()
        );
        if (sudahAda) {
            tampilkanNotifikasi('Kode "' + barangBaru.kode_barang + '" sudah terdaftar', 'error');
            return;
        }

        daftarBarang.push(barangBaru);
        tampilkanNotifikasi('Barang berhasil ditambahkan', 'sukses');
    } else {
        // mode edit - cek bentrok dengan kode milik barang lain
        const bentrok = daftarBarang.some(function (b, i) {
            return i !== indexEdit &&
                b.kode_barang.toLowerCase() === barangBaru.kode_barang.toLowerCase();
        });
        if (bentrok) {
            tampilkanNotifikasi('Kode "' + barangBaru.kode_barang + '" sudah dipakai barang lain', 'error');
            return;
        }

        daftarBarang[indexEdit] = barangBaru;
        tampilkanNotifikasi('Barang berhasil diupdate', 'sukses');
    }

    simpanData();
    resetForm();
    tampilkanTabel();
    tampilkanStatistik();
}


// ====== aksi edit ======
function mulaiEdit(index) {
    const barang = daftarBarang[index];
    if (!barang) return;

    inputKode.value     = barang.kode_barang;
    inputNama.value     = barang.nama_barang;
    inputKategori.value = barang.kategori;
    inputStok.value     = barang.stok;
    inputHarga.value    = barang.harga;
    inputTanggal.value  = barang.tanggal_masuk;

    indexEdit = index;
    judulForm.textContent = 'Edit Barang: ' + barang.kode_barang;
    tombolSubmit.textContent = 'Update Barang';

    // scroll ke atas form
    document.getElementById('form-barang').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


// ====== aksi hapus ======
function hapusBarang(index) {
    const barang = daftarBarang[index];
    if (!barang) return;

    const setuju = confirm('Yakin ingin menghapus barang "' + barang.nama_barang + '" (' + barang.kode_barang + ')?');
    if (!setuju) return;

    // buang barang pada index tsb pakai filter
    daftarBarang = daftarBarang.filter((_, i) => i !== index);

    // kalau sedang ngedit barang yg dihapus, reset
    if (indexEdit === index) {
        resetForm();
    } else if (indexEdit > index) {
        indexEdit = indexEdit - 1;
    }

    simpanData();
    tampilkanTabel();
    tampilkanStatistik();
    tampilkanNotifikasi('Barang berhasil dihapus', 'sukses');
}


// ====== event listener ======
formInput.addEventListener('submit', simpanBarang);

tombolBatal.addEventListener('click', function () {
    resetForm();
    tampilkanNotifikasi('Form telah dikosongkan', 'sukses');
});

// validasi real-time tiap field
for (const id in aturan) {
    const elemen = document.getElementById(id);
    elemen.addEventListener('input', function () {
        cekField(id, elemen.value);
    });
    elemen.addEventListener('change', function () {
        cekField(id, elemen.value);
    });
}

// pencarian real-time
inputCari.addEventListener('input', function () {
    tampilkanTabel();
});

// filter kategori
selectFilter.addEventListener('change', function () {
    tampilkanTabel();
});

// event delegation di tabel - satu listener untuk semua tombol edit & hapus
tbodyBarang.addEventListener('click', function (e) {
    const tombol = e.target.closest('button[data-aksi]');
    if (!tombol) return;

    const aksi = tombol.dataset.aksi;
    const index = Number(tombol.dataset.index);

    if (aksi === 'edit') {
        mulaiEdit(index);
    } else if (aksi === 'hapus') {
        hapusBarang(index);
    }
});


// ====== mulai aplikasi ======
muatData();

// kalau localStorage masih kosong, isi data contoh dulu
if (daftarBarang.length === 0) {
    daftarBarang = [
        { kode_barang: 'JRN-001', nama_barang: 'Mikrotik RB941-2nD hAP Lite', kategori: 'Router',    stok: 15, harga: 350000,  tanggal_masuk: '2026-03-05' },
        { kode_barang: 'JRN-002', nama_barang: 'Kabel UTP Cat6 Belden',       kategori: 'Kabel',     stok: 10, harga: 1200000, tanggal_masuk: '2026-03-06' },
        { kode_barang: 'JRN-003', nama_barang: 'TP-Link TL-SG1008P 8 Port',   kategori: 'Switch',    stok: 3,  harga: 620000,  tanggal_masuk: '2026-03-07' },
        { kode_barang: 'JRN-004', nama_barang: 'Ubiquiti UniFi AC Lite',      kategori: 'Wireless',  stok: 12, harga: 900000,  tanggal_masuk: '2026-03-09' },
        { kode_barang: 'JRN-005', nama_barang: 'Konektor RJ45 Belden',        kategori: 'Aksesoris', stok: 2,  harga: 75000,   tanggal_masuk: '2026-03-10' }
    ];
    simpanData();
}

tampilkanTabel();
tampilkanStatistik();
