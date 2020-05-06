<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/guru')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/guru/edit/'.$guru->kode_guru), 'class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Upload Foto Guru</label>
  <div class="col-md-5">
      <input type="file" name="foto" class="form-control" readonly>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">NIP</label>
    <div class="col-md-5">
        <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo $guru->nip ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $guru->password ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Guru</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Guru" value="<?php echo $guru->nama_guru ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Agama</label>
    <div class="col-md-5">
        <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?php echo $guru->agama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kelamin</label>
    <div class="col-md-5">
        <input type="text" name="kelamin" class="form-control" placeholder="Kelamin" value="<?php echo $guru->kelamin ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $guru->alamat ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">No Telpon</label>
    <div class="col-md-5">
        <input type="text" name="notelpon" class="form-control" placeholder="No Telpon" value="<?php echo $guru->no_telpon ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tempat Lahir</label>
    <div class="col-md-5">
        <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $guru->tempat_lahir ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Lahir</label>
    <div class="col-md-5">
        <input type="date" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $guru->tanggal_lahir ?>" required>
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