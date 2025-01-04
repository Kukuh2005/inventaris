@foreach($kategoriAsset as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="delete{{$item->encrypted_id}}">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Yakin ?</h5> <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body text-center">Apakah anda ingin menghapus data <span class="text-warning">{{$item->kategori_asset}}</span> ?.<br> Data yang telah dihapus tidak dapat dikembalikan.</div>
            <div class="modal-footer"> 
                <form action="/{{auth()->user()->role}}/kategori-asset/{{$item->encrypted_id}}/delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-shadow" id="">Ya, Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></div>
        </div>
    </div>
</div>
@endforeach