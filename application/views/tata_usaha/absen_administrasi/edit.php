<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/absen_administrasi')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/absen_administrasi/edit/'.$absen->nip), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">NIP</label>
    <div class="col-md-5">
        <input type="text" name="nip" class="form-control" placeholder="nip" value="<?php echo $absen->nip ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jam</label>
    <div class="col-md-5">
        <input type="time" name="jam" class="form-control" placeholder="Jam" value="<?php echo $absen->jam ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-5">
        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo $absen->tanggal ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Metode</label>
    <div class="col-md-5">
        <input type="text" name="metode" class="form-control" placeholder="Metode" value="<?php echo $absen->metode ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Status Kehadiran</label>
    <div class="col-md-5">
        <input type="text" name="status_kehadiran" class="form-control" placeholder="Status Kehadiran" value="<?php echo $absen->status_kehadiran ?>" required>
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