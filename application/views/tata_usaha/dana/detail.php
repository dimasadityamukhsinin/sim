<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/dana')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

    <div class="col-lg-12">
        <div class="row col-xs-12">
            <div class="col-sm-2">
                <h4 class="text-bold">
                Keterangan
                </h4>
            </div>
            <div class="col-lg-5">
                <h4>
                : <?php echo $dana->keterangan ?>
                </h4>
            </div>
        </div>
        <div class="row col-xs-12">
            <div class="col-sm-2">
                <h4 class="text-bold">
                JUMLAH
                </h4>
            </div>
            <div class="col-lg-5">
                <h4>
                : <?php echo $dana->jumlah_dana ?>
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
                : <?php echo $dana->tanggal ?>
                </h4>
            </div>
        </div>