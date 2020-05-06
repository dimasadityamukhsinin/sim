<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/absen_guru')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

<?php
//Error Upload
if(isset($error)){
    echo'<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('tata_usaha/absen_guru/tambah/'.$guru->nip), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">NIP</label>
    <div class="col-md-5">
        <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo $guru->nip ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jam</label>
    <div class="col-md-5">
        <input type="time" name="jam" class="form-control" placeholder="Jam" value="<?php echo set_value('jam') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-5">
        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo set_value('tanggal') ?>" required>
    </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Metode</label>
  <div class="col-md-5">
    <select name="metode" class="form-control">
        <?php foreach($metode as $metode) { ?>
        <option value="<?php echo $metode->metode ?>">
            <?php echo $metode->isi_metode ?>
        </option>
        <?php } ?>
      </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Status Kehadiran</label>
    <div class="col-md-5">
        <input type="text" name="status_kehadiran" class="form-control" placeholder="Status Kehadiran" value="<?php echo set_value('status_kehadiran') ?>" required>
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