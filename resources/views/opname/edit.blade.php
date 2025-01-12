@foreach($opname as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Opname</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action=" /{{auth()->user()->role}}/opname/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Barang</label>
                      <select name="id_pengadaan" class="form-control" id="">
                        <option value="">Pilih Barang...</option>
                        @foreach($pengadaan as $barang)
                        <option value="{{$barang->id}}" {{$item->id_pengadaan == $barang->id ? 'selected' : ''}}>{{$barang->kode_pengadaan}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl_opname" value="{{$item->tgl_opname}}" min="{{$item->pengadaan->tgl_pengadaan}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Kondisi</label>
                        <select name="kondisi" class="form-control" id="kondisi">
                          <option value="">Pilih Kondisi...</option>
                          <option value="Baik" {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                          <option value="Rusak Ringan" {{ $item->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                          <option value="Rusak Sedang" {{ $item->kondisi == 'Rusak Sedang' ? 'selected' : '' }}>Rusak Sedang</option>
                          <option value="Rusak Berat" {{ $item->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                          <option value="Hilang" {{ $item->kondisi == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                          <option value="Tidak Layak Pakai" {{ $item->kondisi == 'Tidak Layak Pakai' ? 'selected' : '' }}>Tidak Layak Pakai</option>
                          <option value="Dalam Perbaikan" {{ $item->kondisi == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                          <option value="Dipinjamkan" {{ $item->kondisi == 'Dipinjamkan' ? 'selected' : '' }}>Dipinjamkan</option>
                          <option value="Baru" {{ $item->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                          <option value="Standby" {{ $item->kondisi == 'Standby' ? 'selected' : '' }}>Standby</option>
                          <option value="Kadaluarsa" {{ $item->kondisi == 'Kadaluarsa' ? 'selected' : '' }}>Kadaluarsa</option>
                          <option value="Usang" {{ $item->kondisi == 'Usang' ? 'selected' : '' }}>Usang</option>
                        </select>
                      </div>  
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="">{{$item->keterangan}}</textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach