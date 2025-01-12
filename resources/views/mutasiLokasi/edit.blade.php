@foreach($mutasi_lokasi as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Mutasi Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/mutasi-lokasi/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control" name="id_pengadaan" disabled>
                            <option value="{{$item->pengadaan->id}}">{{$item->pengadaan->kode_pengadaan}}</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Lokasi</label>
                            <select class="form-control" name="id_lokasi">
                                <option value="">Pilih Lokasi...</option>
                                @foreach($lokasi as $lok)
                                    <option value="{{ $lok->id }}" {{ $item->id_lokasi == $lok->id ? 'selected' : '' }}>
                                        {{ $lok->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Mutasi</label>
                            <input type="date" class="form-control" name="tgl_mutasi" value="{{ $item->tgl_mutasi }}" min="{{$item->pengadaan->tgl_pengadaan}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Flag Lokasi</label>
                            <input type="text" class="form-control" name="flag_lokasi" value="{{ $item->flag_lokasi }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Flag Pindah</label>
                            <input type="text" class="form-control" name="flag_pindah" value="{{ $item->flag_pindah }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach