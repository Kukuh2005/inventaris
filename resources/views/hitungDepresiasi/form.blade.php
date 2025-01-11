<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Hitung Depresiasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/hitung-depresiasi/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control" name="id_pengadaan" required>
                            <option value="">Pilih Barang...</option>
                            @foreach($pengadaan as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->kode_pengadaan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Depresiasi</label>
                        <input type="date" class="form-control" name="tgl_hitung_depresiasi" value="<?php echo date('Y-m-d'); ?>"  required>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
