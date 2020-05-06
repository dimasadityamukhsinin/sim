<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/siswa')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/kelas_siswa/tambah/'.$siswa->nis), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">NIS</label>
    <div class="col-md-5">
        <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo $siswa->nis ?>" readonly>
    </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Kelas</label>
  <div class="col-md-5">
    <select name="kelas" class="form-control">
        <?php foreach($kelas as $kelas) { ?>
        <option value="<?php echo $kelas->kode_kelas ?>">
            <?php echo $kelas->nama_jurusan.' - '.$kelas->tingkat_kelas  ?>
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

<?php form_close(); ?>