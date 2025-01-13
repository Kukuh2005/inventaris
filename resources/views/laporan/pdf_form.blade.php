<div class="modal fade" tabindex="-1" role="dialog" id="form-pdf">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Print Out PDF</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Barang</label>
                  <select name="id_barang" class="form-control" id="id_barang">
                    <option value="">Pilih Barang...</option>
                    @foreach($masterBarang as $item)
                    <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                    @endforeach
                  </select>
                </div>                    
                <button type="button" onclick="printBarang(this)" class="btn btn-danger float-right">Print</button>
            </div>
        </div>
    </div>
</div>