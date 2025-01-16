<div class="modal fade" tabindex="-1" role="dialog" id="form-tambah">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Subkategori Asset</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->role}}/subkategori-asset/store" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control" name="kode_sub_kategori_asset" value="{{$kode}}" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="sub_kategori_asset">
                    </div>
                    <div class="form-group">
                      <label>Kategori Asset</label>
                      <select class="form-control" name="id_kategori_asset">
                        <option value="">Pilih Kategori Asset...</option>
                        @foreach($kategoriAsset as $item)
                          <option value="{{$item->id}}">{{$item->kategori_asset}}</option>
                        @endforeach
                      </select>                      
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>