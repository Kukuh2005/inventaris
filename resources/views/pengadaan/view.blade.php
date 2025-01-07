@foreach($pengadaan as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="view{{ $item->encrypted_id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle"></i> Detail Pengadaan - {{ $item->kode_pengadaan }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Informasi Umum -->
                        <div class="card mb-3 border-primary">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-barcode"></i> Informasi Umum
                            </div>
                            <div class="card-body">
                                <p><strong>Nomor Invoice:</strong> {{ $item->no_invoice }}</p>
                                <p><strong>Nomor Seri Barang:</strong> {{ $item->no_seri_barang }}</p>
                                <p><strong>Tahun Produksi:</strong> {{ $item->tahun_produksi }}</p>
                                <p><strong>Tanggal Pengadaan:</strong> {{ $item->tgl_pengadaan }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Informasi Nilai -->
                        <div class="card mb-3 border-success">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-dollar-sign"></i> Informasi Nilai
                            </div>
                            <div class="card-body">
                                <p><strong>Harga Barang:</strong> Rp{{ number_format($item->harga_barang, 0, ',', '.') }}</p>
                                <p><strong>Jumlah Barang:</strong> {{ $item->jumlah_barang }}</p>
                                <p><strong>Nilai Barang:</strong> Rp{{ number_format($item->nilai_barang, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Informasi Barang -->
                        <div class="card mb-3 border-warning">
                            <div class="card-header bg-warning text-white">
                                <i class="fas fa-box"></i> Informasi Barang
                            </div>
                            <div class="card-body">
                                <p><strong>Nama Barang:</strong> {{ $item->masterBarang->nama_barang ?? '-' }}</p>
                                <p><strong>Merk:</strong> {{ $item->merk->merk ?? '-' }}</p>
                                <p><strong>Satuan:</strong> {{ $item->satuan->satuan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Informasi Tambahan -->
                        <div class="card mb-3 border-info">
                            <div class="card-header bg-info text-white">
                                <i class="fas fa-layer-group"></i> Informasi Tambahan
                            </div>
                            <div class="card-body">
                                <p><strong>Depresiasi:</strong> {{ $item->depresiasi->lama_depresiasi ?? '-' }} Tahun</p>
                                <p><strong>Subkategori:</strong> {{ $item->subKategoriAsset->sub_kategori_asset ?? '-' }}</p>
                                <p><strong>Distributor:</strong> {{ $item->distributor->nama_distributor ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Keterangan -->
                        <div class="card border-secondary">
                            <div class="card-header bg-secondary text-white">
                                <i class="fas fa-sticky-note"></i> Keterangan
                            </div>
                            <div class="card-body">
                                <p>{{ $item->keterangan ?? 'Tidak ada keterangan' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach