<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/catatan')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

    <div class="col-lg-12">
        <div class="row col-xs-12">
            <div class="col-sm-2">
                <h4 class="text-bold">
                JUDUL
                </h4>
            </div>
            <div class="col-lg-5">
                <h4>
                : <?php echo $catatan->judul_catatan ?>
                </h4>
            </div>
        </div>
        <div class="row col-xs-12">
            <div class="col-sm-2">
                <h4 class="text-bold">
                TANGGAL
                </h4>
            </div>
            <div class="col-lg-5">
                <h4>
                : <?php echo $catatan->tanggal ?>
                </h4>
            </div>
        </div>
        <div class="row col-xs-12">
            <div class="col-sm-2">
                <h4 class="text-bold">
                JAM
                </h4>
            </div>
            <div class="col-lg-5">
                <h4>
                : <?php echo $catatan->jam ?>
                </h4>
            </div>
        </div>
        <div class="row col-xs-12">
            <div class="col-xs-2">
                <h4 class="text-bold">
                ISI
                </h4>
            </div>
            <div>
            </div>
            <div class="col-lg-5">
                <h4> :
                    <?php echo $catatan->isi ?>
                </h4>
            </div>
        </div>