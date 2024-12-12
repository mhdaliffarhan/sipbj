<!-- MODAL DELETE DATA Penyedia -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeletePenyedia{{$item->id}}">
  <i class="bi bi-trash"></i>
</button>
<div class="modal fade" id="modalDeletePenyedia{{$item->id}}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Penyedia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <p>apakah anda yakin akan menghapus data Penyedia?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form wire:submit="deletePenyedia({{$item->id}})">
            <button type="submit" class="btn btn-danger">Ya, Yakin!</button>
          </form>
        </div>
    </div>
  </div>
</div>
<!-- END MODAL DELETE DATA Penyedia -->