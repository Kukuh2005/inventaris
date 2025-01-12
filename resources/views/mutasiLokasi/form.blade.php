<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Mutasi Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/mutasi-lokasi/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control" name="id_pengadaan">
                            <option value="">Pilih Barang...</option>
                            @foreach($pengadaan as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->kode_pengadaan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Lokasi</label>
                            <select class="form-control" name="id_lokasi">
                                <option value="">Pilih Lokasi...</option>
                                @foreach($lokasi as $lok)
                                    <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Mutasi</label>
                            <input type="date" class="form-control" name="tgl_mutasi" min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Flag Lokasi</label>
                            <input type="text" class="form-control" name="flag_lokasi" placeholder="Masukkan Flag Lokasi">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Flag Pindah</label>
                            <input type="text" class="form-control" name="flag_pindah" placeholder="Masukkan Flag Pindah">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>