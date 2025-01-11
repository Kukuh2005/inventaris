<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Pengadaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/pengadaan/store" method="post">
                    @csrf

                    <!-- Input Kode Pengadaan -->
                    <div class="form-group">
                        <label>Kode Pengadaan</label>
                        <input type="text" class="form-control" name="kode_pengadaan" value="{{$kode}}" disabled>
                    </div>

                    <div class="row">
                        <!-- Input Nomor Invoice -->
                        <div class="form-group col-md-6">
                            <label>Nomor Invoice</label>
                            <input type="text" class="form-control" name="no_invoice" placeholder="Masukkan nomor invoice">
                        </div>

                        <!-- Input Nomor Seri Barang -->
                        <div class="form-group col-md-6">
                            <label>Nomor Seri Barang</label>
                            <input type="text" class="form-control" name="no_seri_barang" placeholder="Masukkan nomor seri barang">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Tahun Produksi -->
                        <div class="form-group col-md-6">
                            <label>Tahun Produksi</label>
                            <input type="number" class="form-control" name="tahun_produksi" placeholder="Masukkan tahun produksi">
                        </div>

                        <!-- Input Tanggal Pengadaan -->
                        <div class="form-group col-md-6">
                            <label>Tanggal Pengadaan</label>
                            <input type="date" class="form-control" name="tgl_pengadaan" max="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Harga Barang -->
                        <div class="form-group col-md-4">
                            <label>Harga Barang</label>
                            <input type="number" class="form-control" id="harga" name="harga_barang" placeholder="Masukkan harga barang">
                        </div>
                        
                        <!-- Input Nilai Barang -->
                        <div class="form-group col-md-4">
                            <label>jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah_barang" oninput="HitungNilai(this)" placeholder="Masukkan jumlah barang">
                        </div>

                        <!-- Input Nilai Barang -->
                        <div class="form-group col-md-4">
                            <label>Nilai Barang</label>
                            <input type="number" class="form-control" id="nilai" name="nilai_barang" value="0" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pilihan Master Barang -->
                        <div class="form-group col-md-4">
                            <label>Barang</label>
                            <select name="id_master_barang" class="form-control">
                                <option value="">Pilih Barang...</option>
                                @foreach($masterBarang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilihan Kondisi -->
                        <div class="form-group col-md-4">
                            <label>Kondisi</label>
                            <select name="fb" class="form-control">
                                <option value="">Pilih Kondisi...</option>
                                <option value="0">Baru</option>
                                <option value="1">Bekas</option>
                            </select>
                        </div>

                        <!-- Pilihan Depresiasi -->
                        <div class="form-group col-md-4">
                            <label>Depresiasi</label>
                            <select name="id_depresiasi" class="form-control">
                                <option value="">Pilih Depresiasi...</option>
                                @foreach($depresiasi as $item)
                                    <option value="{{ $item->id }}">{{ $item->lama_depresiasi }} Tahun</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pilihan Merk -->
                        <div class="form-group col-md-6">
                            <label>Merk</label>
                            <select name="id_merk" class="form-control">
                                <option value="">Pilih Merk...</option>
                                @foreach($merk as $item)
                                    <option value="{{ $item->id }}">{{ $item->merk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilihan Satuan -->
                        <div class="form-group col-md-6">
                            <label>Satuan</label>
                            <select name="id_satuan" class="form-control">
                                <option value="">Pilih Satuan...</option>
                                @foreach($satuan as $item)
                                    <option value="{{ $item->id }}">{{ $item->satuan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pilihan Subkategori Asset -->
                        <div class="form-group col-md-6">
                            <label>Subkategori</label>
                            <select name="id_sub_kategori_asset" class="form-control">
                                <option value="">Pilih Subkategori...</option>
                                @foreach($subKategoriAsset as $item)
                                    <option value="{{ $item->id }}">{{ $item->sub_kategori_asset }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilihan Distributor -->
                        <div class="form-group col-md-6">
                            <label>Distributor</label>
                            <select name="id_distributor" class="form-control">
                                <option value="">Pilih Distributor...</option>
                                @foreach($distributor as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_distributor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Input Keterangan -->
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>