<p class="pull-right">
    <div class="btn-group pull-right">
        <a href="<?php echo base_url('tata_usaha/siswa/cetak/'.$siswa->kode_siswa)?>" title="Cetak" target="_blank" class="btn btn-success btn-md">
            <i class="fa fa-print"></i> Cetak
        </a>
        <a href="<?php echo base_url('tata_usaha/siswa')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>
<div class="col-lg-12">
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            FOTO :
            </h4>
        </div>
        <div>
            <h4>
            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$siswa->foto)?>" class="img img-responsive img-thumbnail" width="15%">
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            NIS :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->nis ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            PASSWORD :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->password ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            NAMA :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->nama_siswa ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            KELAMIN :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->kelamin ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            AGAMA :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->agama ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            ALAMAT :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->alamat ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            NO TELPON :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->no_telpon ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            TEMPAT LAHIR :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->tempat_lahir ?>
            </h4>
        </div>
    </div>
    <div class="row col-xs-12">
        <div class="col-sm-2">
            <h4 class="text-bold">
            TANGGAL LAHIR :
            </h4>
        </div>
        <div>
            <h4>
            <?php echo $siswa->tanggal_lahir ?>
            </h4>
        </div>
    </div>
</div>