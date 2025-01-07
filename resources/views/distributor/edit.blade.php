@foreach($distributor as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Distributor</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action=" /{{auth()->user()->role}}/distributor/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Nama Distributor</label>
                      <input type="text" class="form-control" name="nama_distributor" value="{{$item->nama_distributor}}">
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{$item->alamat}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="{{$item->no_telp}}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$item->email}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{$item->keterangan}}">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach