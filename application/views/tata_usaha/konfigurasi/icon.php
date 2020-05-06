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

// Form Open
echo form_open_multipart(base_url('tata_usaha/konfigurasi/icon'), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Sekolah</label>
    <div class="col-md-5">
        <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" value="<?php echo $konfigurasi->nama_sekolah ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Icon Sekolah</label>
    <div class="col-md-5">
        <input type="file" name="icon" class="form-control" placeholder="Upload Icon Sekolah" value="<?php echo $konfigurasi->icon ?>" required>
        Logo Lama : <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail">
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