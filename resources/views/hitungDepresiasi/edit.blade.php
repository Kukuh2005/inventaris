@foreach($hitungDepresiasi as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Hitung Depresiasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/hitung-depresiasi/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control" name="id_pengadaan" readonly>
                            <option value="{{$item->pengadaan->id}}">{{$item->pengadaan->kode_pengadaan}}</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Tanggal Depresiasi</label>
                            <input type="date" class="form-control" name="tgl_hitung_depresiasi" value="{{ $item->tgl_hitung_depresiasi }}" min="{{$item->pengadaan->tgl_pengadaan}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Durasi (Bulan)</label>
                            <input type="number" class="form-control" name="durasi" value="{{ $item->durasi }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nilai Barang</label>
                        <input type="number" class="form-control" name="nilai_barang" value="{{ $item->nilai_barang }}" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach