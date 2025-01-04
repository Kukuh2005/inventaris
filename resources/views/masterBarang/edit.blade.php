@foreach($masterBarang as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Master Barang</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/master-barang/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control" name="kode_barang" value="{{$item->kode_barang}}" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama_barang" value="{{$item->nama_barang}}">
                    </div>
                    <div class="form-group">
                      <label>Spesifikasi Teknis</label>
                      <input type="text" class="form-control" name="spesifikasi_teknis" value="{{$item->spesifikasi_teknis}}">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach