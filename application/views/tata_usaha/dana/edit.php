<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/dana')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

<?php

// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('tata_usaha/dana/edit/'.$dana->kode_dana), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Keterangan</label>
    <div class="col-md-5">
        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $dana->keterangan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jumlah</label>
    <div class="col-md-5">
        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo $dana->jumlah_dana ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-5">
        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo $dana->tanggal ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jenis</label>
    <div class="col-md-5">
        <input type="text" name="jenis" class="form-control" placeholder="Jenis" value="<?php echo $dana->jenis ?>" required>
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