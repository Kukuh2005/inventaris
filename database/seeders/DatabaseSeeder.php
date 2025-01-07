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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk tabel lokasi
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
    }
}