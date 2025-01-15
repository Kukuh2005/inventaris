<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Merk;
use App\Models\MasterBarang;
use App\Models\Satuan;
use App\Models\Distributor;
use App\Models\Depresiasi;
use App\Models\Pengadaan;
use App\Models\MutasiLokasi;
use App\Models\HitungDepresiasi;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HitungDepresiasi::create([
            'id_pengadaan' => 1,
            'tgl_hitung_depresiasi' => Carbon::now()->toDateString(),
            'bulan' => '1',
            'durasi' => 12,
            'nilai_barang' => 5000000,            
        ]);

        Lokasi::create([
            'kode_lokasi' => 'LOC01',
            'nama_lokasi' => 'Gudang Utama',
            'keterangan' => 'Lokasi penyimpanan utama',
        ]);

        Lokasi::create([
            'kode_lokasi' => 'LOC02',
            'nama_lokasi' => 'Ruang IT',
            'keterangan' => 'Penyimpanan perangkat IT',
        ]);

        Lokasi::create([
            'kode_lokasi' => 'LOC03',
            'nama_lokasi' => 'Kantor Depan',
            'keterangan' => 'Lokasi kantor depan untuk tamu',
        ]);

        // Seeder untuk tabel kategori_asset
        KategoriAsset::create([
            'kode_kategori_asset' => 'KA01',
            'kategori_asset' => 'Peralatan Kantor',
        ]);

        KategoriAsset::create([
            'kode_kategori_asset' => 'KA02',
            'kategori_asset' => 'Peralatan Elektronik',
        ]);

        KategoriAsset::create([
            'kode_kategori_asset' => 'KA03',
            'kategori_asset' => 'Furnitur',
        ]);

        // Seeder untuk tabel subkategori_asset
        SubKategoriAsset::create([
            'id_kategori_asset' => 1,
            'kode_sub_kategori_asset' => 'SK01',
            'sub_kategori_asset' => 'Meja dan Kursi',
        ]);

        SubKategoriAsset::create([
            'id_kategori_asset' => 2,
            'kode_sub_kategori_asset' => 'SK02',
            'sub_kategori_asset' => 'Komputer dan Laptop',
        ]);

        SubKategoriAsset::create([
            'id_kategori_asset' => 3,
            'kode_sub_kategori_asset' => 'SK03',
            'sub_kategori_asset' => 'Lemari Arsip',
        ]);

        // Seeder untuk tabel merk
        Merk::create([
            'merk' => 'Samsung',
            'keterangan' => 'Merk untuk elektronik',
        ]);

        Merk::create([
            'merk' => 'IKEA',
            'keterangan' => 'Merk untuk furnitur',
        ]);

        Merk::create([
            'merk' => 'Logitech',
            'keterangan' => 'Merk untuk perangkat IT',
        ]);

        // Seeder untuk tabel satuan
        Satuan::create([
            'satuan' => 'Unit',
        ]);

        Satuan::create([
            'satuan' => 'Pcs',
        ]);

        Satuan::create([
            'satuan' => 'Set',
        ]);

        // Seeder untuk tabel master_barang
        MasterBarang::create([
            'kode_barang' => 'BRG01',
            'nama_barang' => 'Meja Kantor',
            'spesifikasi_teknis' => 'Kayu Jati, 120x60 cm',
        ]);

        MasterBarang::create([
            'kode_barang' => 'BRG02',
            'nama_barang' => 'Laptop Dell XPS',
            'spesifikasi_teknis' => 'Core i7, 16GB RAM, SSD 512GB',
        ]);

        MasterBarang::create([
            'kode_barang' => 'BRG03',
            'nama_barang' => 'Lemari Arsip',
            'spesifikasi_teknis' => 'Besi, 180x90x45 cm',
        ]);

        Distributor::create([
            'nama_distributor' => 'Dani',
            'alamat' => 'Buduran',
            'no_telp' => '08773645372819',
            'email' => 'dani@gmail.com',
            'keterangan' => 'elektronik',
        ]);

        Depresiasi::create([
            'lama_depresiasi' => 1,
            'keterangan' => 'elektronik',
        ]);

        Depresiasi::create([
            'lama_depresiasi' => 2,
            'keterangan' => 'elektronik',
        ]);

        Depresiasi::create([
            'lama_depresiasi' => 3,
            'keterangan' => 'elektronik',
        ]);

        Pengadaan::create([
            'id_master_barang' => 1, // Referensi ke master barang
            'id_depresiasi' => 1,   // Referensi ke depresiasi
            'id_merk' => 1,         // Referensi ke merk
            'id_satuan' => 1,       // Referensi ke satuan
            'id_sub_kategori_asset' => 1, // Referensi ke subkategori asset
            'id_distributor' => 1,  // Referensi ke distributor
            'kode_pengadaan' => 'PIVN-2025100001',
            'no_invoice' => 'INV-202501',
            'no_seri_barang' => 'SN12345',
            'tahun_produksi' => 2023,
            'tgl_pengadaan' => '2025-01-01',
            'harga_barang' => 1500000,
            'jumlah_barang' => 10,
            'nilai_barang' => 15000000, // Harga * Jumlah
            'fb' => '0',                 // Baru
            'keterangan' => 'Pengadaan awal barang elektronik',
        ]);

        Pengadaan::create([
            'id_master_barang' => 2,
            'id_depresiasi' => 2,
            'id_merk' => 3,
            'id_satuan' => 1,
            'id_sub_kategori_asset' => 2,
            'id_distributor' => 1,
            'kode_pengadaan' => 'PIVN-2025100002',
            'no_invoice' => 'INV-202502',
            'no_seri_barang' => 'SN98765',
            'tahun_produksi' => 2022,
            'tgl_pengadaan' => '2025-01-02',
            'harga_barang' => 25000000,
            'jumlah_barang' => 5,
            'nilai_barang' => 125000000,
            'fb' => '1',                 // Bekas
            'keterangan' => 'Pengadaan laptop untuk staf',
        ]);

        MutasiLokasi::create([
            'id_pengadaan' => 1, // Referensi ke pengadaan
            'id_lokasi' => 1,    // Referensi ke lokasi asal
            'tgl_mutasi' => '2025-01-08',
            'flag_lokasi' => 'Di Gudang',
            'flag_pindah' => 'Selesai',
        ]);
        
        MutasiLokasi::create([
            'id_pengadaan' => 2,
            'id_lokasi' => 2,    // Referensi ke lokasi tujuan
            'tgl_mutasi' => '2025-01-09',
            'flag_lokasi' => 'Dalam Perjalanan',
            'flag_pindah' => 'Dalam Proses',
        ]);

        MutasiLokasi::create([
            'id_pengadaan' => 1,
            'id_lokasi' => 3,    // Referensi ke lokasi tujuan
            'tgl_mutasi' => '2025-01-07',
            'flag_lokasi' => 'Di Kantor Depan',
            'flag_pindah' => 'Selesai',
        ]);

         // Tambahkan lebih banyak data Distributor
         Distributor::create([
            'nama_distributor' => 'Andi Elektronik',
            'alamat' => 'Jakarta Selatan',
            'no_telp' => '081234567890',
            'email' => 'andi@elektronik.com',
            'keterangan' => 'Spesialis barang elektronik',
        ]);

        Distributor::create([
            'nama_distributor' => 'Bina Office Supplies',
            'alamat' => 'Surabaya',
            'no_telp' => '081223344556',
            'email' => 'bina@officesupplies.com',
            'keterangan' => 'Penyedia kebutuhan kantor',
        ]);

        Distributor::create([
            'nama_distributor' => 'Citra Furnitur',
            'alamat' => 'Bandung',
            'no_telp' => '081345678901',
            'email' => 'citra@furniture.com',
            'keterangan' => 'Spesialis furnitur kantor',
        ]);

        Distributor::create([
            'nama_distributor' => 'Delta Komputer',
            'alamat' => 'Yogyakarta',
            'no_telp' => '081987654321',
            'email' => 'delta@komputer.com',
            'keterangan' => 'Penyedia perangkat IT',
        ]);

        Distributor::create([
            'nama_distributor' => 'Eka Hardware',
            'alamat' => 'Denpasar',
            'no_telp' => '081456789012',
            'email' => 'eka@hardware.com',
            'keterangan' => 'Peralatan teknik dan mesin',
        ]);

        // Tambahkan data Pengadaan selama 1 tahun
        $pengadaans = [
            [
                'id_master_barang' => 1,
                'id_depresiasi' => 1,
                'id_merk' => 1,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 1,
                'id_distributor' => 2,
                'kode_pengadaan' => 'PIVN-2025100006',
                'no_invoice' => 'INV-202506',
                'no_seri_barang' => 'SN67891',
                'tahun_produksi' => 2023,
                'harga_barang' => 2000000,
                'jumlah_barang' => 15,
                'nilai_barang' => 30000000,
                'fb' => '0',
                'keterangan' => 'Pengadaan meja kerja tambahan',
            ],
            [
                'id_master_barang' => 2,
                'id_depresiasi' => 2,
                'id_merk' => 3,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 2,
                'id_distributor' => 3,
                'kode_pengadaan' => 'PIVN-2025100007',
                'no_invoice' => 'INV-202507',
                'no_seri_barang' => 'SN98761',
                'tahun_produksi' => 2022,
                'harga_barang' => 22000000,
                'jumlah_barang' => 3,
                'nilai_barang' => 66000000,
                'fb' => '1',
                'keterangan' => 'Pengadaan laptop untuk proyek',
            ],
            [
                'id_master_barang' => 3,
                'id_depresiasi' => 3,
                'id_merk' => 2,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 3,
                'id_distributor' => 4,
                'kode_pengadaan' => 'PIVN-2025100008',
                'no_invoice' => 'INV-202508',
                'no_seri_barang' => 'SN54321',
                'tahun_produksi' => 2024,
                'harga_barang' => 7500000,
                'jumlah_barang' => 8,
                'nilai_barang' => 60000000,
                'fb' => '0',
                'keterangan' => 'Pengadaan lemari arsip tambahan',
            ],
            [
                'id_master_barang' => 2,
                'id_depresiasi' => 2,
                'id_merk' => 3,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 2,
                'id_distributor' => 1,
                'kode_pengadaan' => 'PIVN-2025100009',
                'no_invoice' => 'INV-202509',
                'no_seri_barang' => 'SN54322',
                'tahun_produksi' => 2023,
                'harga_barang' => 21000000,
                'jumlah_barang' => 2,
                'nilai_barang' => 42000000,
                'fb' => '0',
                'keterangan' => 'Pengadaan komputer desktop untuk staf',
            ],
            [
                'id_master_barang' => 1,
                'id_depresiasi' => 1,
                'id_merk' => 2,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 1,
                'id_distributor' => 2,
                'kode_pengadaan' => 'PIVN-2025100010',
                'no_invoice' => 'INV-202510',
                'no_seri_barang' => 'SN98763',
                'tahun_produksi' => 2023,
                'harga_barang' => 1800000,
                'jumlah_barang' => 25,
                'nilai_barang' => 45000000,
                'fb' => '0',
                'keterangan' => 'Pengadaan meja tambahan untuk ruang kerja',
            ],
            [
                'id_master_barang' => 3,
                'id_depresiasi' => 3,
                'id_merk' => 1,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 3,
                'id_distributor' => 4,
                'kode_pengadaan' => 'PIVN-2025100011',
                'no_invoice' => 'INV-202511',
                'no_seri_barang' => 'SN98764',
                'tahun_produksi' => 2024,
                'harga_barang' => 7000000,
                'jumlah_barang' => 6,
                'nilai_barang' => 42000000,
                'fb' => '0',
                'keterangan' => 'Pengadaan lemari arsip untuk gudang utama',
            ],
            [
                'id_master_barang' => 2,
                'id_depresiasi' => 2,
                'id_merk' => 3,
                'id_satuan' => 1,
                'id_sub_kategori_asset' => 2,
                'id_distributor' => 5,
                'kode_pengadaan' => 'PIVN-2025100012',
                'no_invoice' => 'INV-202512',
                'no_seri_barang' => 'SN98765',
                'tahun_produksi' => 2023,
                'harga_barang' => 24000000,
                'jumlah_barang' => 4,
                'nilai_barang' => 96000000,
                'fb' => '1',
                'keterangan' => 'Pengadaan laptop untuk divisi IT',
            ],
        ];

        // Generate tanggal pengadaan
        $startDate = Carbon::now();
        foreach ($pengadaans as $key => $pengadaan) {
            $pengadaan['tgl_pengadaan'] = $startDate->copy()->addMonths($key)->toDateString();
            Pengadaan::create($pengadaan);
        }

    }
}