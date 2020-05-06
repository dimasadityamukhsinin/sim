<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $siswa->tanggal ?>">
    <i class="fa fa-trash-o"></i> Hapus
</button>

<div class="example-modal">
    <div class="modal" id="delete-<?php echo $siswa->tanggal ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Hapus Data Pembayaran</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning">
                <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
                Yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan
              </div>.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <a href="<?php echo base_url('tata_usaha/pembangunan/delete/'.$siswa->kode_pembangunan.'/'.$siswa->nis.'/'.$siswa->tanggal) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Hapus Data Ini</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div><!-- /.example-modal -->
