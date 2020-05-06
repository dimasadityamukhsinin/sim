<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/tahun_ajaran')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/tahun_ajaran/edit/'.$tahun_ajaran->kode_ajaran), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Tahun Ajaran</label>
    <div class="col-md-5">
        <input type="text" name="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran" value="<?php echo $tahun_ajaran->tahun_ajar ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Mulai</label>
    <div class="col-md-5">
        <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" value="<?php echo $tahun_ajaran->tgl_mulai ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Akhir</label>
    <div class="col-md-5">
        <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal Akhir" value="<?php echo $tahun_ajaran->tgl_akhir ?>" required>
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