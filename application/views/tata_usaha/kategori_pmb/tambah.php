<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/kategori_pmb')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/kategori_pmb/tambah'), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Jenis Bayar</label>
    <div class="col-md-5">
        <input type="text" name="jenisbayar" class="form-control" placeholder="Jenis Bayar" value="<?php echo set_value('jenis_bayar') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jumlah</label>
    <div class="col-md-5">
        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah') ?>" required>
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