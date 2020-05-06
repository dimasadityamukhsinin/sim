<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/catatan')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/catatan/tambah'), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Judul</label>
    <div class="col-md-5">
        <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo set_value('judul_catatan') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-5">
        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo set_value('tanggal') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jam</label>
    <div class="col-md-5">
        <input type="time" name="jam" class="form-control" placeholder="Jam" value="<?php echo set_value('jam') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Isi</label>
    <div class="col-md-5">
        <input type="text" name="isi" class="form-control" placeholder="Isi" value="<?php echo set_value('isi') ?>" required>
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