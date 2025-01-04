@foreach($satuan as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Satuan</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action=" /{{auth()->user()->role}}/satuan/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Merk</label>
                      <input type="text" class="form-control" name="satuan" value="{{$item->satuan}}">
                    </div>                 
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach