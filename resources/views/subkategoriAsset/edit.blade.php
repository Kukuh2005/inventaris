@foreach($subkategoriAsset as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->encrypted_id}}">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Edit Subkategori Asset</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action=" /{{auth()->user()->role}}/subkategori-asset/{{$item->encrypted_id}}/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control" name="kode_sub_kategori_asset" value="{{$item->kode_sub_kategori_asset}}" disabled>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="sub_kategori_asset" value="{{$item->sub_kategori_asset}}">
                    </div>
                    <div class="form-group">
                      <label>Kategori Asset</label>
                      <select class="form-control" name="id_kategori_asset" id="">
                        @foreach($kategoriAsset as $kategori)
                        <option value="{{$kategori->id}}" {{$kategori->id == $item->id_kategori_asset ? 'selected' : ''}}>{{$kategori->kategori_asset}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach