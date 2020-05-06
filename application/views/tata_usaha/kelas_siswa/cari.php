<p class="pull-left">
    <div class="btn-group">
        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#cari">
            <i class="fa fa-print"></i> Cetak
        </button>
    </div>
</p>

<div class="example-modal">
    <div class="modal" id="cari">
      <div class="modal-dialog">
        <?php echo form_open(base_url('tata_usaha/kelas_siswa/cetak/'.$cari->kode_kelas), 'class="form-horizontal"') ?>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Hapus Data Kelas Siswa</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="col-md-2 control-label">Jurusan</label>
                <div class="col-md-5">
                    <select name="jurusan" class="form-control">
                      <?php foreach($cari as $cari) { ?>
                        <option value="<?php echo $cari->tingkat_kelas.'/'.$cari->nama_jurusan.'/'.$cari->nama_guru ?>">
                          <?php echo $cari->tingkat_kelas.'-'.$cari->nama_jurusan ?>
                        </option>
                      <?php } ?>
                    </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-times"></i> Close</button>
            <a href="<?php echo base_url('tata_usaha/kelas_siswa/delete/') ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Hapus Data Ini</a>
          </div>
        </div><!-- /.modal-content -->
        <?php echo form_close() ?>
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div><!-- /.example-modal -->
