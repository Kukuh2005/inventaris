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
use App\Models\Opname;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Lokasi Seeder
        $lokasis = [
            ['kode_lokasi' => 'LOC001', 'nama_lokasi' => 'Gudang Utama', 'keterangan' => 'Lokasi penyimpanan utama'],
            ['kode_lokasi' => 'LOC002', 'nama_lokasi' => 'Ruang IT', 'keterangan' => 'Penyimpanan perangkat IT'],
            ['kode_lokasi' => 'LOC003', 'nama_lokasi' => 'Kantor Depan', 'keterangan' => 'Lokasi kantor depan untuk tamu']
        ];
        foreach ($lokasis as $lokasi) {
            Lokasi::create($lokasi);
        }

        // Kategori Asset Seeder
        $kategoriAssets = [
            ['kode_kategori_asset' => 'KA001', 'kategori_asset' => 'Peralatan Kantor'],
            ['kode_kategori_asset' => 'KA002', 'kategori_asset' => 'Peralatan Elektronik'],
            ['kode_kategori_asset' => 'KA003', 'kategori_asset' => 'Furnitur']
        ];
        foreach ($kategoriAssets as $kategori) {
            KategoriAsset::create($kategori);
        }

        // Sub Kategori Asset Seeder
        $subKategoriAssets = [
            ['id_kategori_asset' => 1, 'kode_sub_kategori_asset' => 'SK001', 'sub_kategori_asset' => 'Meja dan Kursi'],
            ['id_kategori_asset' => 2, 'kode_sub_kategori_asset' => 'SK002', 'sub_kategori_asset' => 'Komputer dan Laptop'],
            ['id_kategori_asset' => 3, 'kode_sub_kategori_asset' => 'SK003', 'sub_kategori_asset' => 'Lemari Arsip']
        ];
        foreach ($subKategoriAssets as $subKategori) {
            SubKategoriAsset::create($subKategori);
        }

        // Merk Seeder
        $merks = [
            ['merk' => 'Samsung', 'keterangan' => 'Merk untuk elektronik'],
            ['merk' => 'IKEA', 'keterangan' => 'Merk untuk furnitur'],
            ['merk' => 'Logitech', 'keterangan' => 'Merk untuk perangkat IT']
        ];
        foreach ($merks as $merk) {
            Merk::create($merk);
        }

        // Satuan Seeder
        $satuans = [
            ['satuan' => 'Unit'],
            ['satuan' => 'Pcs'],
            ['satuan' => 'Set']
        ];
        foreach ($satuans as $satuan) {
            Satuan::create($satuan);
        }

        // Master Barang Seeder
        $barangs = [
            ['kode_barang' => 'BRG001', 'nama_barang' => 'Meja Kantor', 'spesifikasi_teknis' => 'Kayu Jati, 120x60 cm'],
            ['kode_barang' => 'BRG002', 'nama_barang' => 'Laptop Dell XPS', 'spesifikasi_teknis' => 'Core i7, 16GB RAM, SSD 512GB'],
            ['kode_barang' => 'BRG003', 'nama_barang' => 'Lemari Arsip', 'spesifikasi_teknis' => 'Besi, 180x90x45 cm'],
            ['kode_barang' => 'BRG004', 'nama_barang' => 'Printer Canon', 'spesifikasi_teknis' => 'Laser, Duplex, Wi-Fi'],
            ['kode_barang' => 'BRG005', 'nama_barang' => 'Monitor LG', 'spesifikasi_teknis' => '27 Inch, 4K UHD'],
            ['kode_barang' => 'BRG006', 'nama_barang' => 'Keyboard Logitech', 'spesifikasi_teknis' => 'Mechanical, Backlit'],
            ['kode_barang' => 'BRG007', 'nama_barang' => 'Kursi Kantor', 'spesifikasi_teknis' => 'Ergonomis, Kulit Sintetis'],
            ['kode_barang' => 'BRG008', 'nama_barang' => 'AC Daikin', 'spesifikasi_teknis' => '1.5 PK, Hemat Energi'],
            ['kode_barang' => 'BRG009', 'nama_barang' => 'Proyektor Epson', 'spesifikasi_teknis' => 'Full HD, 3000 Lumens'],
            ['kode_barang' => 'BRG010', 'nama_barang' => 'Server HP ProLiant', 'spesifikasi_teknis' => 'Xeon, 64GB RAM, 4TB HDD']
        ];
        foreach ($barangs as $barang) {
            MasterBarang::create($barang);
        }

        // Distributor Seeder
        $distributors = [
            ['nama_distributor' => 'Andi Elektronik', 'alamat' => 'Jakarta Selatan', 'no_telp' => '081234567890', 'email' => 'andi@elektronik.com', 'keterangan' => 'Spesialis barang elektronik'],
            ['nama_distributor' => 'Bina Office Supplies', 'alamat' => 'Surabaya', 'no_telp' => '081223344556', 'email' => 'bina@officesupplies.com', 'keterangan' => 'Penyedia kebutuhan kantor'],
            ['nama_distributor' => 'Citra Furnitur', 'alamat' => 'Bandung', 'no_telp' => '081345678901', 'email' => 'citra@furniture.com', 'keterangan' => 'Spesialis furnitur kantor'],
            ['nama_distributor' => 'Delta Komputer', 'alamat' => 'Yogyakarta', 'no_telp' => '081987654321', 'email' => 'delta@komputer.com', 'keterangan' => 'Penyedia perangkat IT'],
            ['nama_distributor' => 'Eka Hardware', 'alamat' => 'Denpasar', 'no_telp' => '081456789012', 'email' => 'eka@hardware.com', 'keterangan' => 'Peralatan teknik dan mesin']
        ];
        foreach ($distributors as $distributor) {
            Distributor::create($distributor);
        }

        // Depresiasi Seeder
        $depresiasis = [
            ['lama_depresiasi' => 1, 'keterangan' => 'elektronik'],
            ['lama_depresiasi' => 2, 'keterangan' => 'furnitur'],
            ['lama_depresiasi' => 3, 'keterangan' => 'peralatan kantor']
        ];
        foreach ($depresiasis as $depresiasi) {
            Depresiasi::create($depresiasi);
        }

        // Pengadaan Seeder
        $pengadaans = [
            ['id_master_barang' => 1, 'id_depresiasi' => 1, 'id_merk' => 1, 'id_satuan' => 1, 'id_sub_kategori_asset' => 1, 'id_distributor' => 1, 'kode_pengadaan' => 'PIVN-00001', 'no_invoice' => 'INV-001', 'no_seri_barang' => 'SN001', 'harga_barang' => 2000000, 'jumlah_barang' => 10, 'nilai_barang' => 20000000, 'tgl_pengadaan' => '2025-01-01', 'fb' => '0', 'keterangan' => 'Pengadaan meja kantor'],
            ['id_master_barang' => 2, 'id_depresiasi' => 2, 'id_merk' => 3, 'id_satuan' => 1, 'id_sub_kategori_asset' => 2, 'id_distributor' => 2, 'kode_pengadaan' => 'PIVN-00002', 'no_invoice' => 'INV-002', 'no_seri_barang' => 'SN002', 'harga_barang' => 25000000, 'jumlah_barang' => 5, 'nilai_barang' => 125000000, 'tgl_pengadaan' => '2025-01-02', 'fb' => '1', 'keterangan' => 'Pengadaan laptop untuk staf']
        ];
        foreach ($pengadaans as $pengadaan) {
            Pengadaan::create($pengadaan);
        }

        // Hitung Depresiasi Seeder
        $hitungDepresiasis = [
            ['id_pengadaan' => 1, 'tgl_hitung_depresiasi' => Carbon::now()->toDateString(), 'bulan' => '1', 'durasi' => 12, 'nilai_barang' => 20000000],
            ['id_pengadaan' => 2, 'tgl_hitung_depresiasi' => Carbon::now()->toDateString(), 'bulan' => '1', 'durasi' => 24, 'nilai_barang' => 125000000]
        ];
        foreach ($hitungDepresiasis as $hitungDepresiasi) {
            HitungDepresiasi::create($hitungDepresiasi);
        }

        // Mutasi Lokasi Seeder
        $mutasiLokasis = [
            ['id_pengadaan' => 1, 'id_lokasi' => 1, 'tgl_mutasi' => '2025-01-08', 'flag_lokasi' => 'Di Gudang', 'flag_pindah' => 'Selesai'],
            ['id_pengadaan' => 2, 'id_lokasi' => 2, 'tgl_mutasi' => '2025-01-09', 'flag_lokasi' => 'Dalam Perjalanan', 'flag_pindah' => 'Dalam Proses']
        ];
        foreach ($mutasiLokasis as $mutasiLokasi) {
            MutasiLokasi::create($mutasiLokasi);
        }

        // Opname Seeder
        $opnames = [
            ['id_pengadaan' => 1, 'jumlah' => 8, 'tgl_opname' => '2025-01-10', 'kondisi' => 'Baik', 'keterangan' => 'Stok awal'],
            ['id_pengadaan' => 2, 'jumlah' => 4, 'tgl_opname' => '2025-01-11', 'kondisi' => 'Baik', 'keterangan' => 'Pengurangan akibat pemakaian']
        ];
        foreach ($opnames as $opname) {
            Opname::create($opname);
        }
    }
}
