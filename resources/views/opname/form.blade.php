<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Opname</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/opname/store" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Barang</label>
                      <select name="id_pengadaan" class="form-control" id="">
                        <option value="">Pilih Barang...</option>
                        @foreach($pengadaan as $barang)
                        <option value="{{$barang->id}}">{{$barang->kode_pengadaan}} - {{$barang->masterBarang->nama_barang}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl_opname" min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" min="1" value="1">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Kondisi</label>
                        <select name="kondisi" class="form-control" id="kondisi">
                          <option value="">Pilih Kondisi...</option>
                          <option value="Baik">Baik</option>
                          <option value="Rusak Ringan">Rusak Ringan</option>
                          <option value="Rusak Sedang">Rusak Sedang</option>
                          <option value="Rusak Berat">Rusak Berat</option>
                          <option value="Hilang">Hilang</option>
                          <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
                          <option value="Dalam Perbaikan">Dalam Perbaikan</option>
                          <option value="Dipinjamkan">Dipinjamkan</option>
                          <option value="Baru">Baru</option>
                          <option value="Standby">Standby</option>
                          <option value="Kadaluarsa">Kadaluarsa</option>
                          <option value="Usang">Usang</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" id=""></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>