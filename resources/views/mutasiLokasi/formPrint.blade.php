<div class="modal fade" tabindex="-1" role="dialog" id="form-mutasi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Print Out PDF</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Tahun</label>
                  <select class="form-control" name="tahun" id="tahun">
                    @foreach($tahun as $item)
                    <option value="{{$item}}" {{$item == $tahun_sekarang ? 'selected' : ''}}>{{$item}}</option>
                    @endforeach
                  </select>
                </div>                    
                <div class="form-group">
                  <label>Bulan</label>
                  <select class="form-control" name="bulan" id="bulan">
                        <option value="1" {{$bulan == '1' ? 'selected' : ''}}>Januari</option>
                        <option value="2" {{$bulan == '2' ? 'selected' : ''}}>Februari</option>
                        <option value="3" {{$bulan == '3' ? 'selected' : ''}}>Maret</option>
                        <option value="4" {{$bulan == '4' ? 'selected' : ''}}>April</option>
                        <option value="5" {{$bulan == '5' ? 'selected' : ''}}>Mei</option>
                        <option value="6" {{$bulan == '6' ? 'selected' : ''}}>Juni</option>
                        <option value="7" {{$bulan == '7' ? 'selected' : ''}}>Juli</option>
                        <option value="8" {{$bulan == '8' ? 'selected' : ''}}>Agustus</option>
                        <option value="9" {{$bulan == '9' ? 'selected' : ''}}>September</option>
                        <option value="10" {{$bulan == '10' ? 'selected' : ''}}>Oktober</option>
                        <option value="11" {{$bulan == '11' ? 'selected' : ''}}>November</option>
                        <option value="12" {{$bulan == '12' ? 'selected' : ''}}>Desember</option>
                    </select>  
                </div>                    
                <button type="button" class="btn btn-danger float-right" onclick="printBulanan(this)">Print</button>
            </div>
        </div>
    </div>
</div>