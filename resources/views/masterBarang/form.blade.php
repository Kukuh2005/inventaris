<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Master Barang</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="/master-barang/store" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control" name="kode">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                      <label>Spesifikasi Teknis</label>
                      <input type="text" class="form-control" name="spesifikasi_teknis">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>