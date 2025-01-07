@foreach($pengadaan as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{ $item->encrypted_id }}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Pengadaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{ auth()->user()->role }}/pengadaan/{{ $item->encrypted_id }}/update" method="post">
                    @csrf
                    @method('PUT')

                    <!-- Input Kode Pengadaan -->
                    <div class="form-group">
                        <label>Kode Pengadaan</label>
                        <input type="text" class="form-control" name="kode_pengadaan" value="{{ $item->kode_pengadaan }}" readonly>
                    </div>

                    <div class="row">
                        <!-- Input Nomor Invoice -->
                        <div class="form-group col-md-6">
                            <label>Nomor Invoice</label>
                            <input type="text" class="form-control" name="no_invoice" value="{{ $item->no_invoice }}">
                        </div>

                        <!-- Input Nomor Seri Barang -->
                        <div class="form-group col-md-6">
                            <label>Nomor Seri Barang</label>
                            <input type="text" class="form-control" name="no_seri_barang" value="{{ $item->no_seri_barang }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Tahun Produksi -->
                        <div class="form-group col-md-6">
                            <label>Tahun Produksi</label>
                            <input type="number" class="form-control" name="tahun_produksi" value="{{ $item->tahun_produksi }}">
                        </div>

                        <!-- Input Tanggal Pengadaan -->
                        <div class="form-group col-md-6">
                            <label>Tanggal Pengadaan</label>
                            <input type="date" class="form-control" name="tgl_pengadaan" value="{{ $item->tgl_pengadaan }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Harga Barang -->
                        <div class="form-group col-md-4">
                            <label>Harga Barang</label>
                            <input type="number" class="form-control" id="harga{{$item->id}}" name="harga_barang" value="{{ $item->harga_barang }}">
                        </div>

                        <!-- Input Jumlah Barang -->
                        <div class="form-group col-md-4">
                            <label>Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah{{$item->id}}" oninput="HitungNilaiEdit({{$item->id}})" value="{{ $item->jumlah_barang }}">
                        </div>

                        <!-- Input Nilai Barang -->
                        <div class="form-group col-md-4">
                            <label>Nilai Barang</label>
                            <input type="number" class="form-control" id="nilai{{$item->id}}" name="nilai_barang" value="{{ $item->nilai_barang }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pilihan Master Barang -->
                        <div class="form-group col-md-6">
                            <label>Barang</label>
                            <select name="id_master_barang" class="form-control">
                                <option value="">Pilih Barang...</option>
                                @foreach($masterBarang as $barang)
                                    <option value="{{ $barang->id }}" {{ $item->id_master_barang == $barang->id ? 'selected' : '' }}>
                                        {{ $barang->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilihan Depresiasi -->
                        <div class="form-group col-md-6">
                            <label>Depresiasi</label>
                            <select name="id_depresiasi" class="form-control">
                                <option value="">Pilih Depresiasi...</option>
                                @foreach($depresiasi as $dep)
                                    <option value="{{ $dep->id }}" {{ $item->id_depresiasi == $dep->id ? 'selected' : '' }}>
                                        {{ $dep->lama_depresiasi }} Tahun
                                    </option>
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
                                @foreach($merk as $m)
                                    <option value="{{ $m->id }}" {{ $item->id_merk == $m->id ? 'selected' : '' }}>
                                        {{ $m->merk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilihan Satuan -->
                        <div class="form-group col-md-6">
                            <label>Satuan</label>
                            <select name="id_satuan" class="form-control">
                                <option value="">Pilih Satuan...</option>
                                @foreach($satuan as $s)
                                    <option value="{{ $s->id }}" {{ $item->id_satuan == $s->id ? 'selected' : '' }}>
                                        {{ $s->satuan }}
                                    </option>
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
                                @foreach($subKategoriAsset as $sub)
                                    <option value="{{ $sub->id }}" {{ $item->id_sub_kategori_asset == $sub->id ? 'selected' : '' }}>
                                        {{ $sub->sub_kategori_asset }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilihan Distributor -->
                        <div class="form-group col-md-6">
                            <label>Distributor</label>
                            <select name="id_distributor" class="form-control">
                                <option value="">Pilih Distributor...</option>
                                @foreach($distributor as $dist)
                                    <option value="{{ $dist->id }}" {{ $item->id_distributor == $dist->id ? 'selected' : '' }}>
                                        {{ $dist->nama_distributor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Input Keterangan -->
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan">{{ $item->keterangan }}</textarea>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-warning float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach