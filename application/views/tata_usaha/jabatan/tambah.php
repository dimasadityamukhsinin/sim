<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/jabatan')?>" title="Kembali" class="btn btn-info btn-md">
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
echo form_open_multipart(base_url('tata_usaha/jabatan/tambah'), 'class="form-horizontal"');
?>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Jurusan</label>
  <div class="col-md-5">
    <select name="jurusan" class="form-control">
        <?php foreach($jurusan as $jurusan) { ?>
        <option value="<?php echo $jurusan->kode_jurusan ?>">
            <?php echo $jurusan->nama_jurusan ?>
        </option>
        <?php } ?>
      </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tingkat Kelas</label>
    <div class="col-md-5">
        <input type="text" name="tingkatkelas" class="form-control" placeholder="Tingkat Kelas" value="<?php echo set_value('tingkat_kelas') ?>" required>
    </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Tahun Ajaran</label>
  <div class="col-md-5">
    <select name="tahunajar" class="form-control">
        <?php foreach($tahun as $tahun) { ?>
        <option value="<?php echo $tahun->kode_ajaran ?>">
            <?php echo $tahun->tahun_ajar?>
        </option>
        <?php } ?>
      </select>
  </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Nama Guru</label>
  <div class="col-md-5">
    <select name="nama" class="form-control">
        <?php foreach($guru as $guru) { ?>
        <option value="<?php echo $guru->kode_guru ?>">
            <?php echo $guru->nama_guru ?>
        </option>
        <?php } ?>
      </select>
  </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Tahun Angkatan</label>
    <div class="col-md-5">
        <input type="text" name="tahunangkatan" class="form-control" placeholder="Tahun Angkatan" value="<?php echo set_value('tahun_angkatan') ?>" required>
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