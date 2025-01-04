<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Lokasi</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/lokasi/store" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control" name="kode_lokasi">
                    </div>
                    <div class="form-group">
                      <label>Nama Lokasi</label>
                      <input type="text" class="form-control" name="nama_lokasi">
                    </div>
                    <div class="form-group">
                      <label>keterangan</label>
                      <input type="text" class="form-control" name="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>