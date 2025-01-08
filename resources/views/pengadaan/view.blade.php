@foreach($pengadaan as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="view{{ $item->encrypted_id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle"></i> Detail Pengadaan - <span class="font-weight-bold align-middle">{{ $item->kode_pengadaan }}</span>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Informasi Pengadaan -->
                <div class="border-bottom mb-3 pb-2">
                    <h6 class="text-info"><i class="fas fa-barcode"></i> Informasi Pengadaan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nomor Invoice:</strong> {{ $item->no_invoice }}</p>
                            <p><strong>Nomor Seri Barang:</strong> {{ $item->no_seri_barang }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Tahun Produksi:</strong> {{ $item->tahun_produksi }}</p>
                            <p><strong>Tanggal Pengadaan:</strong> {{ $item->tgl_pengadaan }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Barang -->
                <div class="border-bottom mb-3 pb-2">
                    <h6 class="text-warning"><i class="fas fa-box"></i> Informasi Barang</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nama Barang:</strong> {{ $item->masterBarang->nama_barang ?? '-' }}</p>
                            <p><strong>Merk:</strong> {{ $item->merk->merk ?? '-' }}</p>
                            <p><strong>Kondisi:</strong> {{ $item->fb == 0 ? 'Baru' : 'Bekas' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Satuan:</strong> {{ $item->satuan->satuan ?? '-' }}</p>
                            <p><strong>Subkategori:</strong> {{ $item->subKategoriAsset->sub_kategori_asset ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Keuangan -->
                <div class="border-bottom mb-3 pb-2">
                    <h6 class="text-success"><i class="fas fa-dollar-sign"></i> Informasi Keuangan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Harga Barang:</strong> Rp{{ number_format($item->harga_barang, 0, ',', '.') }}</p>
                            <p><strong>Jumlah Barang:</strong> {{ $item->jumlah_barang }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Nilai Barang:</strong> Rp{{ number_format($item->nilai_barang, 0, ',', '.') }}</p>
                            <p><strong>Depresiasi:</strong> {{ $item->depresiasi->lama_depresiasi ?? '-' }} Tahun</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Distributor -->
                <div class="border-bottom mb-3 pb-2">
                    <h6 class="text-info"><i class="fas fa-truck"></i> Informasi Distributor</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Distributor:</strong> {{ $item->distributor->nama_distributor ?? '-' }}</p>
                            <p><strong>Alamat:</strong> {{ $item->distributor->alamat ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>No. Telepon:</strong> {{ $item->distributor->no_telp ?? '-' }}</p>
                            <p><strong>Email:</strong> {{ $item->distributor->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div>
                    <h6 class="text-dark"><i class="fas fa-sticky-note"></i> Keterangan</h6>
                    <p>{{ $item->keterangan ?? 'Tidak ada keterangan' }}</p>
                </div>
            </div>
            <div class="modal-footer bg-secondary">
                
            </div>
        </div>
    </div>
</div>
@endforeach