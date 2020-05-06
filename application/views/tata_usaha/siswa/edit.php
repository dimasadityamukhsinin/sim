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
echo form_open_multipart(base_url('tata_usaha/siswa/edit/'.$siswa->kode_siswa), 'class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Unggah Gambar</label>
  <div class="col-md-5">
    <input type="file" name="foto" class="form-control" readonly>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">NIS</label>
    <div class="col-md-5">
        <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo $siswa->nis ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $siswa->password ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Siswa</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" value="<?php echo $siswa->nama_siswa ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kelamin</label>
    <div class="col-md-5">
        <input type="text" name="kelamin" class="form-control" placeholder="Kelamin" value="<?php echo $siswa->kelamin ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Agama</label>
    <div class="col-md-5">
        <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?php echo $siswa->agama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $siswa->alamat ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">No telpon</label>
    <div class="col-md-5">
        <input type="text" name="notelpon" class="form-control" placeholder="No Telpon" value="<?php echo $siswa->no_telpon ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tempat Lahir</label>
    <div class="col-md-5">
        <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $siswa->tempat_lahir ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Lahir</label>
    <div class="col-md-5">
        <input type="date" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $siswa->tanggal_lahir ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Orang Tua Laki-laki</label>
    <div class="col-md-5">
        <input type="test" name="ortulk" class="form-control" placeholder="Orang Tua Laki-laki" value="<?php echo $siswa->ortu_lk ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Orang Tua Perempuan</label>
    <div class="col-md-5">
        <input type="text" name="ortupr" class="form-control" placeholder="Orang Tua Perempuan" value="<?php echo $siswa->ortu_pr ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Asal Sekolah</label>
    <div class="col-md-5">
        <input type="text" name="asalsekolah" class="form-control" placeholder="Asal Sekolah" value="<?php echo $siswa->asal_sekolah ?>" required>
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