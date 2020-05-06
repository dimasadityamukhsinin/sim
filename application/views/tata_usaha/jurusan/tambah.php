<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/jurusan')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('tata_usaha/jurusan/tambah'), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Jurusan</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Jurusan" value="<?php echo set_value('nama_jurusan') ?>" required>
    </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">SPP KELAS</label>
  <div class="col-md-5">
    <select name="spp" class="form-control">
        <?php foreach($spp as $spp) { ?>
        <option value="<?php echo $spp->jumlah ?>">
            Rp.<?php echo number_format($spp->jumlah,'0',',','.') ?>
        </option>
        <?php } ?>
      </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</div>

<?php echo form_close(); ?>