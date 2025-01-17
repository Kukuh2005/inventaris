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
            ['kode_lokasi' => 'LOC003', 'nama_lokasi' => 'Kantor Depan', 'keterangan' => 'Lokasi kantor depan untuk tamu'],
            ['kode_lokasi' => 'LOC004', 'nama_lokasi' => 'Gudang Cabang', 'keterangan' => 'Lokasi penyimpanan cabang'],
            ['kode_lokasi' => 'LOC005', 'nama_lokasi' => 'Laboratorium', 'keterangan' => 'Penyimpanan alat laboratorium']
        ];
        foreach ($lokasis as $lokasi) {
            Lokasi::create($lokasi);
        }

        // Kategori Asset Seeder
        $kategoriAssets = [
            ['kode_kategori_asset' => 'KA001', 'kategori_asset' => 'Peralatan Kantor'],
            ['kode_kategori_asset' => 'KA002', 'kategori_asset' => 'Peralatan Elektronik'],
            ['kode_kategori_asset' => 'KA003', 'kategori_asset' => 'Furnitur'],
            ['kode_kategori_asset' => 'KA004', 'kategori_asset' => 'Peralatan Laboratorium'],
            ['kode_kategori_asset' => 'KA005', 'kategori_asset' => 'Peralatan Kebersihan']
        ];
        foreach ($kategoriAssets as $kategori) {
            KategoriAsset::create($kategori);
        }

        // Sub Kategori Asset Seeder
        $subKategoriAssets = [
            ['id_kategori_asset' => 1, 'kode_sub_kategori_asset' => 'SK001', 'sub_kategori_asset' => 'Meja dan Kursi'],
            ['id_kategori_asset' => 2, 'kode_sub_kategori_asset' => 'SK002', 'sub_kategori_asset' => 'Komputer dan Laptop'],
            ['id_kategori_asset' => 3, 'kode_sub_kategori_asset' => 'SK003', 'sub_kategori_asset' => 'Lemari Arsip'],
            ['id_kategori_asset' => 4, 'kode_sub_kategori_asset' => 'SK004', 'sub_kategori_asset' => 'Mikroskop'],
            ['id_kategori_asset' => 5, 'kode_sub_kategori_asset' => 'SK005', 'sub_kategori_asset' => 'Vacuum Cleaner']
        ];
        foreach ($subKategoriAssets as $subKategori) {
            SubKategoriAsset::create($subKategori);
        }

        // Merk Seeder
        $merks = [
            ['merk' => 'Samsung', 'keterangan' => 'Merk untuk elektronik'],
            ['merk' => 'IKEA', 'keterangan' => 'Merk untuk furnitur'],
            ['merk' => 'Logitech', 'keterangan' => 'Merk untuk perangkat IT'],
            ['merk' => 'Olympus', 'keterangan' => 'Merk untuk alat laboratorium'],
            ['merk' => 'Panasonic', 'keterangan' => 'Merk untuk elektronik rumah tangga']
        ];
        foreach ($merks as $merk) {
            Merk::create($merk);
        }

        // Satuan Seeder
        $satuans = [
            ['satuan' => 'Unit'],
            ['satuan' => 'Pcs'],
            ['satuan' => 'Set'],
            ['satuan' => 'Box'],
            ['satuan' => 'Pack']
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
            ['kode_barang' => 'BRG005', 'nama_barang' => 'Mikroskop Olympus', 'spesifikasi_teknis' => 'Digital, 40x Zoom']
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
            ['lama_depresiasi' => 12, 'keterangan' => 'elektronik'],
            ['lama_depresiasi' => 24, 'keterangan' => 'furnitur'],
            ['lama_depresiasi' => 36, 'keterangan' => 'peralatan kantor'],
            ['lama_depresiasi' => 48, 'keterangan' => 'alat laboratorium'],
            ['lama_depresiasi' => 60, 'keterangan' => 'peralatan kebersihan']
        ];
        foreach ($depresiasis as $depresiasi) {
            Depresiasi::create($depresiasi);
        }
    }
}
