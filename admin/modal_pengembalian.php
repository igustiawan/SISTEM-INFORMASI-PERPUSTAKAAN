<div id="delete_book<?php echo $id_peminjaman ?>" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


      <div class="modal-body">
        <div class="alert alert-success">Anda yakin buku ini dikembalikan ?</div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" href="simpan_pengembalian.php<?php echo '?id='.$id; ?>&<?php echo 'id_buku='.$id_buku; ?>">Yes</a>
  			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
      </div>

    </div>
  </div>
  </div>
