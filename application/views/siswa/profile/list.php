<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<?php
//Error Upload
if(isset($error)){
    echo'<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

?>

<div class="form-group">
    <label class="col-md-2 control-label">Foto</label>
    <div class="col-md-5">
        <img src="<?php echo base_url('assets/upload/image/'.$siswa->foto) ?>" class="img img-responsive img-thumbnail" width="200">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Siswa</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" value="<?php echo $siswa->nama_siswa ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">NIS</label>
    <div class="col-md-5">
        <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo $siswa->nis ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $siswa->password ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kelamin</label>
    <div class="col-md-5">
        <input type="text" name="kelamin" class="form-control" placeholder="Kelamin" value="<?php echo $siswa->kelamin ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Agama</label>
    <div class="col-md-5">
        <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?php echo $siswa->agama ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tempat Lahir</label>
    <div class="col-md-5">
        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $siswa->tempat_lahir ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Lahir</label>
    <div class="col-md-5">
        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $siswa->tanggal_lahir ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-md-5">
        <textarea name="alamat" class="form-control" placeholder="Alamat" readonly><?php echo $siswa->tempat_lahir ?></textarea>
    </div>
</div>

<?php echo form_close(); ?>