<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/pembangunan')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/pembangunan/tambah/'.$siswa->nis), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">NIS</label>
    <div class="col-md-5">
        <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo $siswa->nis ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-5">
        <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo set_value('tanggal') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jumlah</label>
    <div class="col-md-5">
        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah_bayar') ?>" required>
    </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Jenis Pembayaran</label>
  <div class="col-md-5">
    <select name="jenis" class="form-control">
        <?php foreach($jumlah as $jumlah) { ?>
        <option value="<?php echo $jumlah->kode_bayar_pmb ?>">
            <?php echo $jumlah->jenis_bayar ?>
        </option>
        <?php } ?>
      </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tahun Ajaran</label>
    <div class="col-md-5">
        <input type="text" name="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran" value="<?php echo set_value('tahun_ajaran') ?>" required>
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