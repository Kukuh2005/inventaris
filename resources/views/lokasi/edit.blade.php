@foreach($lokasi as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Lokasi</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action=" /{{auth()->user()->role}}/lokasi/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control" name="kode_lokasi" value="{{$item->kode_lokasi}}" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nama Lokasi</label>
                      <input type="text" class="form-control" name="nama_lokasi" value="{{$item->nama_lokasi}}">
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="{{$item->keterangan}}">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach